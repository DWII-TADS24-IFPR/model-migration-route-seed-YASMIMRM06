<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <h1>Pessoas: </h1>
    @foreach ($pessoas as $pessoa)
        <div>
            <h2>{{ $pessoa->nome }}</h2>
            <p>Idade: {{ $pessoa->idade }}</p>
            <p>CPF: {{ $pessoa->cpf }}</p>
        </div>
    @endforeach
</div>
