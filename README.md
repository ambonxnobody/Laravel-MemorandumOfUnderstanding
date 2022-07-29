Catatan untuk aplikasi MoU :
1. Untuk fitur jenis kerjasama dimatikan, jika ingin menyalakan kembali Anda mungkin harus mengecek list folder dan file dibawah ini :
	- Folder database (migration mou, seeder.php[untuk mengisi otomatis data kerjasama])
	- Folder (app/Http/Controller/MouController.php, model MoU dan model Kerjasama)
	- Folder (resources/views/modals/tambahMoU.blade.php, resources/views/contents/MoU/edit.blade.php)
2. Jika ingin menambahkan fitur CRUD pada tabel kerjasamas Anda bisa mencopy-paste dari Controller dan views dari setting MoU. Tinggal menyesuaikan beberapa komponen seperti kolom database, dll.