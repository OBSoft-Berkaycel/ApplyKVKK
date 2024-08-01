
# KVKK Yönetim Sistemi | Kurulum

Bu proje, Laravel çerçevesi kullanılarak geliştirilmiştir. Aşağıdaki adımları takip ederek projeyi yerel ortamınızda çalıştırabilirsiniz.

## Gereksinimler

Projenin çalışması için aşağıdaki yazılımların sisteminizde yüklü olması gerekmektedir:

- **PHP** >= 8.1
- **Composer** >= 2.x
- **MySQL** (veritabanı olarak)
- **Node.js** >= 18.x
- **npm** >= 9.x (isteğe bağlı)

## Kurulum Adımları

Aşağıdaki kurulum adımları sırasıyla yapılmalıdır!

### 1. Bağımlılıkları Yükleyin

PHP bağımlılıklarını Composer kullanarak yükleyin:

```bash
composer install
```

### 2. Ortam Dosyasını Ayarlayın

`.env.example` dosyasını kopyalayarak `.env` dosyasını oluşturun:

```bash
cp .env.example .env
```

### 3. Uygulama Anahtarını Üretin

Laravel'in uygulama anahtarını oluşturun:

```bash
php artisan key:generate
```

### 4. Veritabanını Yapılandırın

`.env` dosyasını açın ve veritabanı ayarlarını yapın:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=veritabanı_adı
DB_USERNAME=kullanıcı_adı
DB_PASSWORD=şifre
```

### 5. Veritabanını Migrasyonlarla Kurun

Veritabanını migrasyonlar aracılığıyla kurun:

```bash
php artisan migrate
```
Başlangıç için dataları oluşturmak için aşağıdaki komutu çalıştırın:

```bash
php artisan db:seed
```

### 6. Node Bağımlılıklarını Kurun
Node yapılandırması için aşağıdaki komutları sırasıyla çalıştırın!
```bash
npm install
npm run build
```

### İlk Kurulum Sonrası
Kurulum tamamlandıktan sonra panel'e aşağıdaki kullanıcı bilgileriyle giriş yapabilirsiniz:
```bash
Mail,Kullanıcı Adı, Telefon No: superadmin@admin.com, superadmin veya 5998887766
Şifre: Qazwsx123!
```