Vba script oletools ile decode edildi.Sunucudan ps scriptin indirilmesi belirtiliyordu yazarin adi kullanilarak.

```
In [15]: b64d('S3VsbGFuaWNpQWRpTWk=')
Out[15]: 'KullaniciAdiMi'
```

olevba vbaProject1.bin
Creator                         : tgh43ft56du7asw59oa02smawx2cbnm.ps1

Bulunduktan sonra ps1 scripti bulundu.

http://85.111.95.27/264dc8a2e84a32512a24142ca203cd86/tgh43ft56du7asw59oa02smawx2cbnm.ps1

adresinden gelen powershell script içindeki base64 string decomp.py ile decode edildi. (powershell-part2.ps1) decomp2.py ile bir sonraki aşama için işlemler gerçekleştirildi.Powershell-part3.ps1 incelendiğinde decomp2.py içersinde bulunan dllbytes değişkeninden oluşan dll dosyası incelendi.

Eğer ki domain ismi eşleşiyor ise voidfunc çağırılıyordu.

Void func içinde  : dinlenen port ,crc32 kontrol ve 6 bytelik komutun byte byte kontrolü yapılıyor.

Doğru crc kullanılarak bruteforce yapıldı.
