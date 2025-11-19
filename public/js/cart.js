// ============================================
// FUNGSI UTAMA: Tambah Produk ke Keranjang
// ============================================
async function addToCart(productId, productName, productPrice) {
    console.log(`Menambahkan ke keranjang: ${productName} (ID: ${productId})`);

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId,
                name: productName,
                price: productPrice,
                quantity: 1
            })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        console.log('Berhasil:', data);
        
        // Update UI
        updateCartCount(data.cart);
        renderCartUI(data.cart);
        
        // Tampilkan Toast (ganti alert)
        showToast(`${productName} berhasil ditambahkan!`);

    } catch (error) {
        console.error('Error menambah keranjang:', error);
        showToast('Gagal menambahkan ke keranjang. Coba lagi.', 'danger');
    }
}

// ============================================
// FUNGSI: Update Jumlah Produk di Keranjang
// ============================================
async function updateQuantity(productId, newQuantity) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Jika quantity 0 atau kurang, hapus item
    if (newQuantity <= 0) {
        return removeFromCart(productId);
    }

    try {
        const response = await fetch('/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: newQuantity
            })
        });

        if (!response.ok) throw new Error('Update failed');

        const data = await response.json();
        updateCartCount(data.cart);
        renderCartUI(data.cart);

    } catch (error) {
        console.error('Error update quantity:', error);
        showToast('Gagal mengupdate jumlah', 'danger');
    }
}

// ============================================
// FUNGSI: Hapus Produk dari Keranjang
// ============================================
async function removeFromCart(productId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch('/cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId
            })
        });

        if (!response.ok) throw new Error('Remove failed');

        const data = await response.json();
        updateCartCount(data.cart);
        renderCartUI(data.cart);
        showToast('Produk dihapus dari keranjang', 'warning');

    } catch (error) {
        console.error('Error remove from cart:', error);
        showToast('Gagal menghapus produk', 'danger');
    }
}

// ============================================
// FUNGSI: Update Angka di Badge Keranjang
// ============================================
function updateCartCount(cart) {
    let totalItems = 0;
    if (cart) {
        for (const id in cart) {
            totalItems += cart[id].quantity;
        }
    }
    
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        cartCountElement.innerText = totalItems;
    }
}

// ============================================
// FUNGSI: Render Cart Items di Off-Canvas
// ============================================
function renderCartUI(cart) {
    const container = document.getElementById('cart-items-container');
    const footer = document.getElementById('cart-footer');
    
    if (!container) return;
    
    // Jika keranjang kosong
    if (!cart || Object.keys(cart).length === 0) {
        container.innerHTML = `
            <div class="cart-empty">
                <i class="bi bi-cart-x fs-1 text-muted"></i>
                <p class="mt-3">Keranjang Anda masih kosong</p>
                <small class="text-muted">Mulai tambahkan produk favorit Anda!</small>
            </div>
        `;
        if (footer) footer.style.display = 'none';
        return;
    }

    // Render items
    let html = '';
    let total = 0;

    for (const id in cart) {
        const item = cart[id];
        const subtotal = item.price * item.quantity;
        total += subtotal;

        html += `
            <div class="cart-item">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="mb-1 fw-semibold">${item.name}</h6>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-muted small">Rp ${item.price.toLocaleString('id-ID')}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-secondary" onclick="updateQuantity('${id}', ${item.quantity - 1})">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <button class="btn btn-outline-secondary" disabled style="min-width: 45px;">
                                    ${item.quantity}
                                </button>
                                <button class="btn btn-outline-secondary" onclick="updateQuantity('${id}', ${item.quantity + 1})">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <button class="btn btn-sm btn-link text-danger p-0" onclick="removeFromCart('${id}')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <span class="fw-bold text-primary">Rp ${subtotal.toLocaleString('id-ID')}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    container.innerHTML = html;
    
    if (footer) {
        document.getElementById('cart-total').innerText = `Rp ${total.toLocaleString('id-ID')}`;
        footer.style.display = 'block';
    }
}

// ============================================
// FUNGSI: Tampilkan Bootstrap Toast
// ============================================
function showToast(message, type = 'success') {
    const toastEl = document.getElementById('addToCartToast');
    const toastBody = document.getElementById('toast-message');
    
    if (toastEl && toastBody) {
        toastBody.innerText = message;
        
        // Ubah warna sesuai type
        toastEl.classList.remove('toast-success', 'toast-danger', 'toast-warning');
        
        if (type === 'danger') {
            toastEl.style.backgroundColor = '#dc3545';
            toastEl.style.color = '#fff';
        } else if (type === 'warning') {
            toastEl.style.backgroundColor = '#ffc107';
            toastEl.style.color = '#000';
        } else {
            toastEl.style.backgroundColor = '#10b981';
            toastEl.style.color = '#fff';
        }
        
        const toast = new bootstrap.Toast(toastEl, {
            autohide: true,
            delay: 3000
        });
        toast.show();
    }
}

// ============================================
// LOAD CART SAAT HALAMAN DIMUAT
// ============================================
document.addEventListener('DOMContentLoaded', async function() {
    console.log('🛒 Loading cart data...');
    
    try {
        const response = await fetch('/cart/get');
        if (!response.ok) throw new Error('Failed to fetch cart');
        
        const data = await response.json();
        console.log('Cart data loaded:', data);
        
        updateCartCount(data.cart);
        renderCartUI(data.cart);
        
    } catch (error) {
        console.error('Error loading cart:', error);
    }
});