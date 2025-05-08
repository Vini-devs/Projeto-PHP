<footer id="footer" class="bg-light text-center py-3 fixed-bottom">
    <p>&copy; 2023 SkillForge. Todos os direitos reservados.</p>
</footer>

<!-- Adiciona a classe 'fixed-bottom' se o documento for menor que a altura da janela -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const footer = document.getElementById("footer");
        const documentHeight = document.documentElement.scrollHeight;
        const windowHeight = window.innerHeight;

        if (documentHeight <= windowHeight) {
            footer.classList.add("fixed-bottom");
        } else {
            footer.classList.remove("fixed-bottom");
        }
    });
</script>

</body>
</html>