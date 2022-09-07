<pre>
	[Services Enycryption by Kukuh TW]:
Layanan Encrypt Decrypt on the FLY

Anda khawatir , data anda akan bocor suatu saat?,
Simpan data penting anda dalam keadaan ter-encrypt.
Tidak perlu pusing, sekarang ada layanan Services Enycryption by Kukuh TW


adalah layanan untuk membantu aplikasi anda menyimpan data dalam keadaan terencrypt 
untuk dimasukkan ke dalam database apps anda, Dan sekaligus
melakukan decrypt ketika ada kebutuhan untuk menampilkan data pada applikasi.

Jangan lagi menyimpan data pelanggan anda dalam keadaan telanjang / plain text.
Gunakan [Services Enycryption by Kukuh TW] untuk melindungi data pelanggan anda.

untuk melakukan encrypt/ecrtypt anda memerlukan API dari server kami, daftarkan
aplikasi anda, lalu kirimkan data mentah/data terdecrypt anda, kami akan membalikkan data dalam keadaan
ter-encrypt/decrypt. Dengan cara ini, 
anda tidak perlu repot memikirkan cara encrypt/decrypt, biar kami yang mengurusnya.

Noted:
[Services Enycryption by Kukuh TW], tidak akan menyimpan data mentah, data encrypt/decrypt anda. 
Kami hanya memproses secara on the fly dalam environtment SSL 128bit.


Contoh data yang anda kirimkan

Case 1: Melakukan encryption data anda
{
	"AppsID":"9120380",
	"Apps_TOKEN":"PVt7Zcgt8mHXrLyxaY91V",
	"Organization":"Startup ABC",
	"data":[
	{
		"data_field":"Nama",
		"data_raw":"Akang Sugus"
	},

	{
		"data_field":"Alamat"
		"data_raw":"Jl Kebahagiaan Raya nomor 3 Pondok Kere Jakarta Fair"
	},
	
	]
}

Return dari kami
{
	"ID_1":"90",
	"ID_2":"8201341",
	"data": [
	{
		"data_field":"Nama",
		"data_result":"RhLXoeZQZKVx6uBoxLzrdnDAtgIqv7HILl1fGY5RYByegoFhWKVBXT8OdzErApIQtOO2NQ/ZLMIBe/goA86ijuE7LzA5"		
	},
	{
		"data_field":"Alamat",
		"data_result":"hCvep6Dt1w1hqGC76txMbbh9oaUkQoEdXsCeTMvyZ03VHcSt5oRA5Xpv9h4AijkJaA8fduglwqOU5AgMoZ4OAMOAvJJY"		
	},

	]

}

=======================================================================

Case 2: melakukan decrypt data anda untuk ditampilkan pada apps
{
	"AppsID":"9120380",
	"Apps_TOKEN":"PVt7Zcgt8mHXrLyxaY91V",
	"Organization":"Startup ABC",
	"ID_1":"90",
	"ID_2":"8201341",
	"data" : [
	{
		"data_field":"Nama",
		"data_encrypt":"RhLXoeZQZKVx6uBoxLzrdnDAtgIqv7HILl1fGY5RYByegoFhWKVBXT8OdzErApIQtOO2NQ/ZLMIBe/goA86ijuE7LzA5"
	},
	{
		"data_field":"Alamat",
		"data_encrypt":"hCvep6Dt1w1hqGC76txMbbh9oaUkQoEdXsCeTMvyZ03VHcSt5oRA5Xpv9h4AijkJaA8fduglwqOU5AgMoZ4OAMOAvJJY"
	},
	
	]

}

Return dari kami
{
	"ID_1":"90",
	"ID_2":"8201341",
	"data": [
	{
		"data_field": "Nama",
		"data_decrypt":"Akang Sugus"		
	},
{
		"data_field": "Alamat",
		"data_decrypt":"Jl Kebahagiaan Raya nomor 3 Pondok Kere Jakarta Fair"		
	},


	]

}

===========================================

</pre>
