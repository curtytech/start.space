<!-- Botões Flutuantes das Redes Sociais -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col space-y-3 hidden md:block">
    <a href="https://youtube.com" 
       target="_blank" 
       rel="noopener noreferrer"
       class="floating-btn flex items-center justify-center bg-red-600 hover:bg-red-700 group p-2 rounded-full"
       title="YouTube">
        <i class="fab fa-youtube text-white text-xl group-hover:scale-110 transition-transform duration-200"></i>
    </a>

    <a href="https://web.whatsapp.com" 
       target="_blank" 
       rel="noopener noreferrer"
       class="floating-btn flex items-center justify-center bg-green-500 hover:bg-green-600 group p-2 rounded-full"  
       title="WhatsApp Web">
        <i class="fab fa-whatsapp text-white text-xl group-hover:scale-110 transition-transform duration-200"></i>
    </a>

    <a href="https://instagram.com" 
       target="_blank" 
       rel="noopener noreferrer"
       class="floating-btn flex items-center justify-center bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 hover:from-purple-600 hover:via-pink-600 hover:to-orange-600 group p-2 rounded-full"
       title="Instagram">
        <i class="fab fa-instagram text-white text-xl group-hover:scale-110 transition-transform duration-200"></i>
    </a>

    <a href="https://facebook.com" 
       target="_blank" 
       rel="noopener noreferrer"
       class="floating-btn flex items-center justify-center bg-blue-600 hover:bg-blue-700 group p-2 rounded-full" 
       title="Facebook">
        <i class="fab fa-facebook-f text-white text-xl group-hover:scale-110 transition-transform duration-200"></i>
    </a>
</div>

<style>
.floating-btn {
    @apply w-14 h-14 rounded-full shadow-lg flex items-center justify-center;
    @apply transform transition-all duration-300 ease-in-out;
    @apply hover:scale-110 hover:shadow-xl;
    animation: float 3s ease-in-out infinite;
}

.floating-btn:nth-child(1) { animation-delay: 0s; }
.floating-btn:nth-child(2) { animation-delay: 0.5s; }
.floating-btn:nth-child(3) { animation-delay: 1s; }
.floating-btn:nth-child(4) { animation-delay: 1.5s; }

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

/* Responsividade */
@media (max-width: 768px) {
    .floating-btn {
        @apply w-12 h-12;
    }
    
    .floating-btn i {
        @apply text-lg;
    }
}

/* Efeito de pulso ao passar o mouse */
.floating-btn:hover {
    animation: pulse 0.6s ease-in-out;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}
</style>