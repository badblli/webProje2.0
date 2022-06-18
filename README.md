
<img src="https://upload.wikimedia.org/wikipedia/tr/thumb/c/c4/OM%C3%9C_logo.svg/1200px-OM%C3%9C_logo.svg.png" align="left" width ="300" height ="300">

# Proje Hakkında Genel Tanımlar ve Açıklamalar
Bu web sayfası Ondokuz Mayıs Üniversitesi Web Projesi Yönetimi dersi Final Projesi için oluşturulmuştur.

## Projenin Tanımı
Proje, anlaştığım firmanın istekleri doğrultusunda ziraat firmasının tanıtımı,ziraat mühendisi hakkında iletişim bilgileri ve zirai ürün markalarının kısa tanıtımlarını içermektedir. Bu bilgiler kullandığım MySQL veritabanından çekilmektedir.
Projede Yararlanılan Platform ve Yazılım Dilleri: Öncelikle projemi hazırlarken PHP yazılım dilinin yanı sıra AJAX kullanmayı tercih ettim. Günümüz teknolojisine ayak uydurmayı başarmış, stabil ve hızlı çalışan bir sunucu programlama dilidir. Tasarım kısmında ise hazır tema olarak bootstrap tercih ettim ancak kendim eklediğim HTML,CSS ve JAVASCRIPT alanları da mevcuttur. Veri tabanı olarak MySQL kullanmayı tercih ettim. Bunun sebebi ise PHP’nin Linux platformlarda daha hızlı çalıştığı ve MySQL en iyi senkronizasyonu Linux alt yapısında sağlamasından kaynaklanmaktadır. 
# Endüstri analizi 
Firma ve ürün tanıtımında sade ama ilgi çekici açıklamalarla beraber uygun tasarımlarla desteklenmiştir. 
# Hedef kullanıcı analizi  
Hedef kullanıcıların Antalya bölgesindeki çiftçiler olduğu tespit edilmiş ve bu doğrultuda kullanıcıların web sitesinin bulunabilirliğini arttırmak adına sitenin anahtar kelimeleri ayarlanmıştır.
# İhtiyaçların Belirlenmesi 
İhtiyaçlar görüşülen firmanın istekleri; “Firma Tanıtımı ve Ürün Tanıtımı” şeklinde belirlenerek sektörün ve kullanıcıların muhtemel istekleri doğrultusunda uygun formata çevrilip tasarlanan website arayüzü kodlanmış, veritabanı oluşturulmuş ve site fonksiyonları inşa edilmiştir. 
Admin, Teknik Ekip ve kullanıcıların kullanımına uygun sade bir tasarım kullanılmıştır. 
Kullanıcılara rahat bir kullanım sunmak adına web sitesi responsive olarak tasarlanmış ve mobil uyumlu hale getirilmiştir. Aynı zamanda bağlantı hızlarının en stabil seviyeye ulaştırmak için veri tabanı olarak MySQL kullanmayı tercih edilmiştir. Bunun sebebi ise PHP’nin Linux platformlarda daha hızlı çalıştığı ve MySQL en iyi senkronizasyonu Linux alt yapısında sağlamasından kaynaklanmaktadır. 
Veri tabanı bağlantısının kesilmemesi ve bilgi akışının sürekliliği adına linux server kiralanarak bununla beraber 7/24 desteklenmesi planlanmıştır.

# Veri tabanı Diyagramı
<img src="https://i.hizliresim.com/qbtdmf9.png" align="center" width ="400" height ="400">


# Projenin Fonksiyonları

 ## Firma Tanıtımı:
 Anlaştığım firmanın benden istediği şekilde basit bir website tasarlayıp kodladım. 

 ## Zirai Ürünlerin Tanıtımı
  Firmanın bana vermiş olduğu ürünler listesinden yola çıkarak tanıtım sayfasını hazırladım.
 ## Admin Panel
  Yönetici paneli için harici bir web sitesi yapmak yerine mevcut siteye gömülü bir sistem yapmayı tercih ettim. Bu panelde site ayarları(site adı, başlığı, açıklaması, anahtar kelimeleri, logo, email, sosyal medya ve iletişim bilgileri) bunun yanı sıra sitede görüntülenecek ürünler hakkında bilgileri düzenlenelebilir. Fakat anlaştığım firma sitenin admin panelini kullanmayacağından burayı sadece ürünlere kendim erişmek için ekledim. 
