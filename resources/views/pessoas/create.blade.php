<div>
    <!-- We must ship. - Taylor Otwell -->
    <h1>Criar Pessoa</h1>

    <form action="{{ route('pessoas.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text"  name="nome" required>
        </div>
        <div>
            <label for="idade">Idade:</label>
            <input type="number"  name="idade" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text"  name="cpf" required>
        </div>
        <button type="submit">Criar</button>
    </form>
</div>
