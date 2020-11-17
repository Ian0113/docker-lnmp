# docker-lnmp
使用docker建立lnmp

# 需求
1. [Docker](https://www.docker.com/)
2. [Docker-compose](https://docs.docker.com/compose/)

# 使用方式

將container設置到Docker `docker-compose up -d [<service name>]`

將container從Docker移除 `docker-compose down [<service name>]`

開啟已有container `docker-compose start [<service name>]`

關閉已開啟container `docker-compose stop [<service name>]`

透過container執行命令 `docker-compose exec <service name> <command>`

查看已有container狀態 `docker-compose ps`


# 資料夾概述
```
/
├─── mariadb/
|       ├─── Dockerfile
|       └─── my.cnf..................... docker-compose up 搬進 container
├─── nginx/
|       ├─── sites/..................... docker-compose up 搬進 container
|       |       ├─── default.conf....... 預設會與 /www/public 位置綁定
|       |       ├─── local.test.conf.... 預設會與 /www/local.test 位置綁定
|       |       └─── new.conf.exp....... 範例 cp 進行修改
|       ├─── Dockerfile
|       └─── nginx.conf................. docker-compose up 搬進 container
├─── php-fpm/
|       ├─── Dockerfile
|       └─── php7.4.ini................. docker-compose up 搬進 container
├─── phpmyadmin/
|       └─── Dockerfile
├─── www/............................... 與 nginx & php-fpm 檔案位置共用區
|       ├─── public/.................... 預設訪問 "Hello World!"
|       └─── local.test/................ 測試DB
├─── .env............................... 系項設定至 docker-compose.yml
└─── docker-compose.yml................. 多容器應用設定 透過 Dockerfile 引入設定
```

# 筆記

## [docker](https://docs.docker.com/engine/reference/commandline/docker/)

`docker search <image>` 從 docker hub 搜尋 image

`docker pull <image>` 從 docker hub 拉取 image

`docker images` 列出所有 image

`docker image rm  <image>| docker rmi <image>` 刪除 image

`dcoker build <path | url>` 從 path|url 的 Dockerfile 建 image

`docker run <image> [command]` 透過 image 建立的 container 執行 command

`docker run [-d] [-p [local ip]<local port>:<container port>] <image> [command]` 其中 -d是背景執行 -p是local與container之間的port對應

`docker commit <container id>` 將 container 所有設定保存 (如果有設定名稱也可以用)

`docker start <container id>` 啟動 container (如果有設定名稱也可以用)

`docker stop <container id>` 停止 container (如果有設定名稱也可以用)

`docker exec -it <container id> <command>` 透過已啟動 container 執行命令


## [docker file](https://docs.docker.com/engine/reference/builder/)

`FROM <image>` 從 docker hub 拉取並建立臨時 image

`COPY <local path> <container path>` 從 local 把東西放入 image 內

`RUN <command>` 在 image 執行基本命令


## [docker compose](https://docs.docker.com/compose/compose-file/)

```
version: '3'

networks:
    frontend: 
    backend: 

services:

    <service name>:............................................ 設定服務名稱 docker-compose up <service name>
        container_name: <container name> ...................... 容器名稱 docker ps -a 可以看到
        build:
            context: <Dockerfile dir> ......................... 存放Dockerfile的資料夾位置
            args:
                - <arg name>=<value> .......................... 設定變數進Dockerfile方式
        volumes:
            - <local path>:<container path> ................... 綁定 local 及 container 路徑方式
        expose:
            - <container port> ................................ container 對外開放的 port(在docker 內部)
        ports:
            - "[<local ip>:]<local port>:<container port>" .... local與container之間的port對應
        environment:
            - ??? ............................................. 內建 image 可以設定
        networks:
            - backend ......................................... container 在哪個網路下
        depends_on:
            - <service name> .................................. 依賴某個 service
```




