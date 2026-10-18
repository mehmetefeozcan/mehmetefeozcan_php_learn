# BÖTE - HAYEF Yönetim Paneli

Bu proje, PHP ile sayfa tabanlı bir web uygulamasının nasıl düzenlenebileceğini gösteren küçük bir örnektir. Dersler, öğrenciler, öğretim elemanları ve sınav sonuçları için listeleme, ekleme ve silme ekranları içerir. Ortak yapıların (head, menü, yollar) tek bir yerden nasıl yönetildiğini ve her modülün aynı kalıbı nasıl izlediğini anlatır.

Bu README, projeye yeni başlayan birinin **mevcut bir modülü anlayabilmesi** ve **sıfırdan yeni bir modül ekleyebilmesi** için hazırlanmıştır.

---

## 1. Gereksinimler

- **MAMP** (veya PHP 7.4+ yüklü herhangi bir sunucu ortamı)
- Tarayıcı (Bootstrap CDN üzerinden yüklenir, internet bağlantısı gerekir)

Proje klasörünü MAMP'ın `htdocs` dizinine koyun ve tarayıcıdan açın:

```
http://localhost/mehmetefeozcan/
```

> MAMP'ın port ayarına göre adres `http://localhost:8888/mehmetefeozcan/` şeklinde olabilir.

---

## 2. Proje Yapısı

```
mehmetefeozcan/
├── index.php                          # Ana sayfa (modüllere giden kartlar)
├── config/
│   ├── paths_config.php               # Sabit yollar (BASE_URL, COMPONENTS_PATH vb.)
│   ├── head_config.php                # <head> içeriği: meta, başlık, CSS
│   └── script_config.php              # Bootstrap JavaScript dosyası
├── components/
│   ├── layout/
│   │   └── header.php                 # Üst menü (navbar)
│   └── modal/
│       └── lesson_info_modal.php      # Ders detay penceresi (sadece lesson/index.php kullanır)
├── lesson/                            # Dersler modülü
│   ├── index.php                      # Listeleme
│   ├── create.php                     # Ekleme formu
│   └── store.php                      # Kaydetme ve silme
├── student/                           # Öğrenciler modülü
│   ├── index.php
│   ├── create.php
│   └── store.php
├── academic_staff/                    # Öğretim elemanları modülü
│   ├── index.php
│   ├── create.php
│   └── store.php
├── exam/                              # Sınavlar modülü
│   ├── index.php
│   ├── create.php
│   └── store.php
└── public/
    ├── css/main.css                   # Kendi stillerimiz
    └── img/hayef_logo.png             # Görseller
```

**Kural:** Tarayıcının doğrudan açtığı dosyalar sayfadır (`index.php`, `*/index.php`, `*/create.php`). `config/`, `components/` ve `*/store.php` dosyaları ise sayfalara **parça olarak eklenir** ya da form tarafından hedef alınır; tek başına bir ekran göstermezler.

---

## 3. Temel Mantık: Her Sayfa Aynı İskeleti Kullanır

Her sayfa dört adımdan oluşur:

1. **Gerekli dosyaları dahil et** (modülün `store.php`'si, gerekirse diğer modüllerin verisi).
2. **Sayfa değişkenlerini tanımla:** `$pageTitle` ve `$pagePath`.
3. **HTML iskeletini kur**; `<head>` içini `head_config.php`'den al, menüyü `header.php`'den al.
4. **Sayfanın sonunda** JavaScript'i `script_config.php`'den yükle.

Örnek olarak `index.php` (ana sayfa):

```php
<?php
$pageTitle = "Hoşgeldiniz";   // Tarayıcı sekmesindeki başlığın bir parçası
$pagePath = "/index.php";     // Menüde hangi linkin "aktif" görüneceğini belirler
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "./config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container mt-4 d-grid gap-4">
        <h1>Hoşgeldiniz</h1>
        ...
    </div>
<?php include_once "./config/script_config.php" ?>
</body>

</html>
```

Modül sayfaları (`lesson/index.php` gibi) aynı iskeleti kullanır; tek fark, `config/` dosyalarına **bir üst klasörden** (`../config/...`) ulaşmalarıdır.

---

## 4. Ortak Yapılar

### 4.1 Yollar: `config/paths_config.php`

Proje içindeki tüm yollar tek dosyada tanımlıdır. Bir yolu değiştirmek gerektiğinde yalnızca burayı düzenlersiniz.

```php
define("ROOT_PATH", dirname(__DIR__));                        // Proje klasörünün fiziksel yolu
define("BASE_URL", "/mehmetefeozcan");                        // Tarayıcıdaki kök adres
define("PUBLIC_CSS_URL", PUBLIC_FOLDER_URL . "/css");         // CSS klasörü
define("PUBLIC_IMAGES_URL", PUBLIC_FOLDER_URL . "/img");      // Görsel klasörü
define("COMPONENTS_PATH", ROOT_PATH . "/components");         // Bileşen klasörünün fiziksel yolu
```

Ayrım önemlidir:

- `*_URL` sabitleri **tarayıcının** kullanacağı adreslerdir (`href`, `src`).
- `*_PATH` sabitleri **sunucunun** kullanacağı dosya yollarıdır (`include` için).

### 4.2 Head: `config/head_config.php`

Her sayfanın `<head>` kısmında tekrar yazılması gereken meta etiketleri, başlık ve CSS dosyaları burada toplanır.

```php
<title><?= htmlspecialchars(!empty($pageTitle) ? $pageTitle . " | BÖTE - HAYEF" : "BÖTE - HAYEF") ?></title>
```

`$pageTitle` tanımlıysa başlık `Sayfa Adı | BÖTE - HAYEF`, tanımlı değilse `BÖTE - HAYEF` olur. Bootstrap ve `main.css` de burada yüklenir; yeni sayfada bunları tekrar eklemeniz gerekmez.

### 4.3 Script: `config/script_config.php`

Bootstrap'in JavaScript dosyasını yükler. Modal ve navbar'ın açılıp kapanması için gereklidir.

### 4.4 Menü: `components/layout/header.php`

Menü bir dizi üzerinden oluşturulur:

```php
$menuList = [
    ["id" => 1, "name" => "Ana Sayfa", "route" => "/index.php"],
    ["id" => 2, "name" => "Dersler", "route" => "/lesson/index.php"],
    ["id" => 3, "name" => "Öğrenci", "route" => "/student/index.php"],
    ["id" => 4, "name" => "Öğretim Elemanı", "route" => "/academic_staff/index.php"],
    ["id" => 5, "name" => "Sınavlar", "route" => "/exam/index.php"],
];
```

Her sayfa `$pagePath` değişkenini tanımlar. Bu değer menüdeki `route` ile aynıysa link `active` sınıfını alır ve vurgulanır.

Modüllerin `create.php` sayfaları da `$pagePath` olarak **kendi listeleme sayfasını** tanımlar. Örneğin `lesson/create.php` içinde `$pagePath = "/lesson/index.php";` yazılıdır; böylece "Yeni Ders Oluştur" ekranındayken de "Dersler" menüsü vurgulu kalır.

---

## 5. Modüllerin Ortak Kalıbı

Dört modül (`lesson`, `student`, `academic_staff`, `exam`) aynı üç dosyayla çalışır:

| Dosya | Görevi |
|---|---|
| `index.php` | Verileri `store.php`'den alır ve tablo olarak gösterir. Her satırda "Sil" formu bulunur. |
| `create.php` | Ekleme formunu gösterir. Form `store.php`'ye `POST` gönderir. |
| `store.php` | Oturumdaki veriyi tutar; `POST` ile kayıt ekler, `action=delete` ile kayıt siler. |

### 5.1 Veri akışı

```
create.php (form)  ──POST──▶  store.php (kaydet)  ──redirect──▶  index.php (listele)
index.php (sil butonu) ──POST action=delete──▶  store.php (sil) ──redirect──▶  index.php
```

### 5.2 `store.php`'nin yapısı

Her `store.php` aynı sırayla çalışır:

**a) Oturumu başlat**

```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

**b) Örnek veriyi yükle (varsa)**

```php
if (!isset($_SESSION['lessons'])) {
    $_SESSION['lessons'] = [ ... ];
}
```

**c) Silme isteğini işle**

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteLesson((int) $_POST['id']);
    header("Location: index.php");
    exit;
}
```

**d) Ekleme isteğini işle**

Form alanlarının `name` değerleri `$_POST` anahtarıdır. Örneğin `create.php` içinde `name="lessonCode"` varsa `store.php` içinde `$_POST['lessonCode']` olarak okunur. Ad değiştirirseniz iki dosyada da değiştirmelisiniz.

```php
$_SESSION['lessons'][] = [
    'code' => trim($_POST['lessonCode'] ?? ''),
    'title' => trim($_POST['lessonName'] ?? ''),
    ...
];

header("Location: index.php");
exit;
```

> **Önemli:** `header()` ile yönlendirme yapılacaksa sayfadan **hiç HTML çıktısı** verilmemiş olmalıdır. `store.php` dosyalarında HTML yoktur; bu yüzden yönlendirme sorunsuz çalışır.

**e) Okuma ve silme fonksiyonları**

```php
function getLessons(): array
{
    return $_SESSION['lessons'] ?? [];
}
```

`index.php` bu fonksiyonla veriyi alır:

```php
require_once __DIR__ . "/store.php";
$tableItems = getLessons();
```

Tablo satırları `foreach` ile üretilir. Kullanıcıdan gelen her değer ekrana basılmadan önce `htmlspecialchars()` ile temizlenir (XSS koruması).

---

## 6. Modüller Arası İlişki

Modüller birbirinden bağımsızdır, ancak `exam/` modülü diğer iki modülün verisini kullanır:

```php
// exam/create.php
include_once dirname(__DIR__) . "/lesson/store.php";
include_once dirname(__DIR__) . "/student/store.php";

$lessons = getLessons();
$students = getStudents();
```

Bu sayede sınav formundaki "Ders" ve "Öğrenci" listeleri, o modüllerdeki kayıtlardan oluşur.

Bu bağlantının bir sonucu var: sınav kaydı ders ve öğrenciyi **id ile değil, isim (metin) olarak** saklar. Ders veya öğrenci adı değişirse eski sınav kayıtları eski adı tutmaya devam eder.

> **Dikkat:** `exam/create.php` dosyası iki `store.php` dosyasını da dahil ettiği için, o dosyaya `POST` gelirse ilgili kayıt işlemleri de tetiklenebilir. Bu yüzden başka bir modülün `store.php`'sini dahil ederken dikkatli olun.

### 6.1 Sabit listeler

Bazı seçenek listeleri veritabanı yerine doğrudan `create.php` içinde dizi olarak tanımlıdır:

| Dosya | Liste | Not |
|---|---|---|
| `lesson/create.php` | `$academicStaffList` | Öğretim elemanı modülündeki kayıtlardan **bağımsızdır** |
| `lesson/create.php` | `$dayList`, `$timeList`, `$durationList` | Sabit değerler |
| `student/create.php` | `$departmentList` | Sabit değerler |
| `exam/create.php` | `$examTypes` | Sabit değerler |

Yeni bir öğretim elemanı eklediğinizde `lesson/create.php` içindeki listeye ayrıca eklemeniz gerekir.

---

## 7. Adım Adım: Yeni Bir Modül Eklemek

Örnek olarak `classroom/` (derslik) modülü ekleyelim. Sadece `name` ve `capacity` alanları olsun.

**Adım 1 — Klasörü ve `store.php` dosyasını oluşturun**

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteClassroom((int) $_POST['id']);
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = array_column($_SESSION['classrooms'] ?? [], 'id');

    $_SESSION['classrooms'][] = [
        'id' => $ids ? max($ids) + 1 : 1,
        'name' => trim($_POST['name'] ?? ''),
        'capacity' => (int) ($_POST['capacity'] ?? 0),
    ];

    header("Location: index.php");
    exit;
}

function getClassrooms(): array
{
    return $_SESSION['classrooms'] ?? [];
}

function deleteClassroom(int $id): void
{
    $_SESSION['classrooms'] = array_values(array_filter(
        $_SESSION['classrooms'] ?? [],
        fn($classroom) => $classroom['id'] !== $id
    ));
}
```

`$ids` satırı, projedeki diğer `store.php` dosyalarıyla aynı kalıpta olmalıdır.

**Adım 2 — `create.php` (form)**

```php
<?php
$pageTitle = "Yeni Derslik";
$pagePath = "/classroom/index.php";
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "../config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container p-4 bg-light mt-4 rounded-3">
        <h3><?= $pageTitle ?></h3>

        <form action="store.php" method="POST">
            <div class="mt-4">
                <label for="name" class="form-label">Derslik Adı</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mt-4">
                <label for="capacity" class="form-label">Kapasite</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="row justify-content-end mt-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
            </div>
        </form>
    </div>

    <?php include_once "../config/script_config.php" ?>
</body>

</html>
```

**Adım 3 — `index.php` (listeleme)**

```php
<?php
require_once __DIR__ . "/store.php";

$pageTitle = "Derslikler";
$pagePath = "/classroom/index.php";

$tableItems = getClassrooms();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "../config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container p-4 bg-light mt-4 rounded-3">
        <div class="row justify-content-between">
            <span class="col-auto"><h3><?= $pageTitle ?></h3></span>
            <div class="col-auto">
                <a class="btn btn-primary btn-sm rounded-2" href="create.php" role="button">Yeni Derslik</a>
            </div>
        </div>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Ad</th>
                    <th scope="col">Kapasite</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableItems as $i): ?>
                    <tr>
                        <td class="align-middle">#<?= htmlspecialchars($i['id']) ?></td>
                        <td class="align-middle"><?= htmlspecialchars($i['name']) ?></td>
                        <td class="align-middle"><?= htmlspecialchars($i['capacity']) ?></td>
                        <td class="align-middle">
                            <form action="store.php" method="POST"
                                onsubmit="return confirm('Bu dersliği silmek istediğinize emin misiniz?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($i['id']) ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php include_once "../config/script_config.php" ?>
</body>

</html>
```

**Adım 4 — Menüye ekleyin**

`components/layout/header.php` içindeki diziye bir satır ekleyin:

```php
["id" => 6, "name" => "Derslikler", "route" => "/classroom/index.php"],
```

**Adım 5 — Ana sayfaya kart ekleyin (isteğe bağlı)**

`index.php` içinde mevcut kartların yapısını kopyalayıp `classroom` linkini yazın.

**Adım 6 — Test edin**

```
http://localhost/mehmetefeozcan/classroom/index.php
```

---

## 8. Veriyi Nerede Tutuyoruz?

Bu projede veritabanı **yoktur**. Tüm veriler `$_SESSION` içinde tutulur:

- Bazı modüllerde (`lesson`, `student`, `exam`) ilk açılışta örnek kayıtlar `store.php` içinde tanımlıdır. `academic_staff` modülünde örnek veri yoktur.
- Eklenen ve silinen kayıtlar yalnızca o tarayıcı oturumu boyunca geçerlidir.
- Tarayıcıyı kapatıp açtığınızda veya oturum sona erdiğinde değişiklikler sıfırlanır.

Gerçek bir uygulamada bu kısım bir veritabanı (MySQL vb.) ile değiştirilir; `index.php` ve `create.php` dosyalarının büyük kısmı aynı kalabilir.

---

## 9. Bilinen Sorunlar

Bunlar güncel kodda bulunan ve bilinçli olarak henüz düzeltilmeyen konulardır.

### 9.1 Yetkilendirme yok

Giriş sistemi henüz yoktur. Sayfayı açabilen herkes kayıt ekleyip silebilir. Menüdeki "Giriş yap" butonu şu an yalnızca görsel amaçlıdır.

---

## 10. Sık Karşılaşılan Hatalar

| Belirti | Olası neden | Çözüm |
|---|---|---|
| Sayfa boş ya da stilsiz görünüyor | CSS yolu yanlış | `PUBLIC_CSS_URL` ve `BASE_URL` değerlerini kontrol edin |
| `Failed to open stream` hatası | `include` yolu yanlış | `__DIR__` ile yolu yeniden yazın |
| `Cannot modify header information` | `header()` çağrısından önce çıktı var | Dosyanın başında boşluk ya da HTML olmadığını kontrol edin |
| Menüde link vurgulanmıyor | `$pagePath` ile `route` eşleşmiyor | İkisinin de başında `/` olduğundan ve birebir aynı olduğundan emin olun |
| Kayıt eklenmiyor, form geri dönüyor | `name` attribute'u `store.php` içindeki `$_POST` anahtarıyla uyuşmuyor | Form alanlarının `name` değerlerini `store.php` ile karşılaştırın |
| Sınav formunda ders/öğrenci görünmüyor | `store.php` dahil edilmemiş ya da oturumda kayıt yok | `exam/create.php` içindeki `include_once` satırlarını kontrol edin |
| Modal içeriği boş açılıyor | `data-bs-*` değeri eksik ya da ID eşleşmiyor | `data-bs-target` ile modalın `id`'sini karşılaştırın |

---

## 11. Hızlı Özet

1. Sabit yollar → `config/paths_config.php`
2. `<head>` ayarları → `config/head_config.php`
3. Menü → `components/layout/header.php` (yeni modülü buraya ekleyin)
4. Her modül üç dosyadır: `index.php`, `create.php`, `store.php`
5. Form → `store.php` → `index.php` akışıyla veri işlenir
6. Veriler `$_SESSION` içinde tutulur; her yeni kayıt, modülündeki en büyük `id`'nin bir fazlasını alır
