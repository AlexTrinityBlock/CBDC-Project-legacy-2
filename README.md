# CBDC-Project
嘉義大學資訊安全實驗室的數位貨幣科技部計畫。

# 專案環境啟動說明

## 1. 安裝Docker

## 2. 啟動容器

啟動Docker compose 容器群

```
docker-compose up -d
```

首次啟動會調用大量CPU，並且執行很久，這是正常的，請耐心等待。

若要從別的Shell命令行連入容器群。

```
docker compose exec -it bank-backend-server bash
```

# Laravel 相關指令

## 安裝Laravel依賴組件

```
composer install --ignore-platform-reqs
```

## 啟動伺服器

```
php artisan serve --host=0.0.0.0 --port=80 &
```

