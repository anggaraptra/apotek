// hapus data
$('.tombolHapus').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Yakin?',
    text: 'Data yang sudah dihapus tidak dapat kembali!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});

// update data alert
$(document).on('click', '.tombolUpdate', function (e) {
  e.preventDefault();
  swal
    .fire({
      title: 'Konfirmasi!',
      text: 'Apakah anda yakin sudah mengedit data dengan benar?',
      icon: 'warning',
      confirmButtonText: 'Update',
      showCancelButton: true,
      cancelButtonText: 'Batal',
    })
    .then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil di update',
          showConfirmButton: false,
        });
        setTimeout(() => {
          $('#formUpdate').submit();
        }, '1000');
      }
    });
});

// insert data alert
$(document).on('click', '.tombolInsert', function (e) {
  e.preventDefault();
  swal
    .fire({
      title: 'Konfirmasi!',
      text: 'Apakah anda yakin sudah mengisi data dengan benar?',
      icon: 'question',
      confirmButtonText: 'Tambah',
      showCancelButton: true,
      cancelButtonText: 'Batal',
    })
    .then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Data berhasil ditambahkan',
          showConfirmButton: false,
        });
        setTimeout(() => {
          $('#formInsert').submit();
        }, '1000');
      }
    });
});

// logout
$('.tombolLogout').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Yakin ingin logout?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});

// modal
$('.modal').on('click', (e) => {});
