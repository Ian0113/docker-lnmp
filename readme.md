# docker-lnmp
使用docker建立lnmp

# 需求
1. [Docker](https://www.docker.com/)
2. [Docker-compose](https://docs.docker.com/compose/)


# 使用方式
## 將服務設置到Docker
```
docker-compose up -d <service name>
```

## 將服務從Docker移除
```
docker-compose down <service name>
```

## 開啟已有服務
```
docker start <service name>
```

## 關閉已開啟服務
```
docker stop <service name>
```
