# About
This repo is for a WordPress site I developed at the start of my career.

Recently, I've migrated the site from a managed server to a cloud server and deployed it using docker swarm and Github actions.

# Server setup (Debian)

Install some basic packages:
```
sudo apt install apt-transport-https ca-certificates curl gnupg lsb-release dos2unix jq make -y
```

Add the docker repository for Debian:
```
sudo mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

Install docker:
```
sudo apt update
sudo apt install docker-ce docker-ce-cli containerd.io docker-compose-plugin
```

Setup the docker service:
```
sudo systemctl start docker
sudo systemctl enable docker
sudo systemctl status docker
sudo usermod -aG docker <user>
```

Open some ports for docker swarm:
```
sudo ufw allow 2377/tcp
sudo ufw allow 7946/tcp
sudo ufw allow 7946/udp
sudo ufw allow 4789/udp
```

Sync files with rsync from windows (use CMD):
```
rsync -avz -e "C:\ProgramData\chocolatey\lib\rsync\tools\bin\ssh.exe" * <user>@<server_ip>:<directory>
```

Configure ufw:
```
sudo ufw allow proto tcp from any to any port 80,443
sudo ufw status
```

## Unlimited bash history
```
nano ~/.bashrc
```

Set these values to -1 and save:
```
HISTSIZE=-1
HISTFILESIZE=-1
```

Apply the changes to the current session:
```
source ~/.bashrc
```

Watchout for the impact in the disk space, to clear the history:
```
history -c
```

# Project setup
```
docker swarm init
```

Create the secrets for the php service:
```
echo '' | docker secret create wordpress_db_name -
echo '' | docker secret create wordpress_db_user -
echo '' | docker secret create wordpress_db_password -
echo '' | docker secret create wordpress_home -
echo '' | docker secret create wordpress_site_url -
echo '' | docker secret create wordpress_auth_key -
echo '' | docker secret create wordpress_secure_auth_key -
echo '' | docker secret create wordpress_logged_in_key -
echo '' | docker secret create wordpress_nonce_key -
echo '' | docker secret create wordpress_auth_salt -
echo '' | docker secret create wordpress_secure_auth_salt -
echo '' | docker secret create wordpress_logged_in_salt -
echo '' | docker secret create wordpress_nonce_salt -
```

Create the secrets for the Caddy service:
```
echo '' | docker secret create caddy_cloudflare_api_token -
```

Create the secrets for the Mariadb service:
```
echo '' | docker secret create mariadb_root_password -
```

If you need to remove secrets:
```
docker secret rm wordpress_home
```

Check the Makefile help with:
```
make help
```

Deploy the service:
```
make deploy-prod
```

Undeploy the service:
```
make undeploy
```

Fix website permissions if needed:
```
docker exec -it <php_container_id> bash
ls -l
chown -R www-data:www-data .
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
ls -l
```

## Development
Check container logs:
```
docker logs -f --tail <number_of_lines> <container_id>
```

Example of image build, push and pull:
```
cd ./php
docker build -t marcgraub/totretolacio-php .
docker push marcgraub/totretolacio-php
docker pull marcgraub/totretolacio-php:latest
```

Reload the Caddy server to test Caddyfile changes:
```
docker exec -it <caddy_container_id> sh
caddy reload -c /etc/caddy/Caddyfile
```

Convert script to unix text file (in vscode, at the bottom right corner  you can change the end of line squence to LF):
```
dos2unix ./docker/utils/docker-logs
```

## Docker compose
If you comment all the lines related to the secrets in the docker-compose file and add the relevant secrets to the wp-config.php you can use:
```
docker compose -f "docker-compose-prod.yml" up -d --build
docker compose -f "docker-compose-prod.yml" down
```