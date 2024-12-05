// ---------------------- header------------------------
// Ambil elemen-elemen yang diperlukan
const menuToggle = document.querySelector('.menu-toggle');
const sidebar = document.querySelector('.navigasi-sidebar-container');
const overlay = document.getElementById('overlay');
const closeButton = document.querySelector('.navigasi-sidebar-container img[alt="keluar"]');

// Fungsi untuk membuka sidebar dan overlay
menuToggle.addEventListener('click', () => {
  sidebar.classList.add('open'); // Tampilkan sidebar
  overlay.style.display = 'block'; // Tampilkan overlay
});

// Fungsi untuk menutup sidebar dan overlay
const hideOverlay = () => {
  sidebar.classList.remove('open'); // Sembunyikan sidebar
  overlay.style.display = 'none'; // Sembunyikan overlay
};

// Tambahkan event listener untuk tombol keluar dan overlay
closeButton.addEventListener('click', hideOverlay);
overlay.addEventListener('click', hideOverlay);



// -------------------------button profile-------------------------
function enableEdit() {
  // Aktifkan semua input dan dropdown
  const inputs = document.querySelectorAll("#input-small, #profilePicInput");
  inputs.forEach((input) => {
    input.disabled = false;
  });

  // Sembunyikan tombol "Sunting" dan "Keluar"
  document.getElementById("editButton").classList.add("hidden");
  document.getElementById("logoutButton").classList.add("hidden");

  // Tampilkan tombol "Simpan"
  document.getElementById("saveButton").classList.remove("hidden");
}

function saveChanges() {
  // Nonaktifkan kembali semua input
  const inputs = document.querySelectorAll("#input-small, #profilePicInput");
  inputs.forEach((input) => {
    input.disabled = true;
  });

  // Tampilkan kembali tombol "Sunting" dan "Keluar"
  document.getElementById("editButton").classList.remove("hidden");
  document.getElementById("logoutButton").classList.remove("hidden");

  // Sembunyikan tombol "Simpan"
  document.getElementById("saveButton").classList.add("hidden");
}

function updateProfilePicture(event) {
  const input = event.target;
  const file = input.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function (e) {
      // Perbarui gambar profil dengan URL gambar yang diunggah
      document.getElementById("profilePic").src = e.target.result;
    };

    reader.readAsDataURL(file);
  }
}

