/*
Curso de Engenharia de Software - UniEVANGÉLICA
Disciplina de Programação Web
Desenvolvedor: Felipe Fernandes - 2120954
Data: 04/06/2024 
*/

document.addEventListener('DOMContentLoaded', () => {
    const carForm = document.getElementById('car-form');
    const carList = document.getElementById('car-list');

    // Função para atualizar a lista de carros
    function updateCarList() {
        fetch('/api/cars')
            .then(response => response.json())
            .then(cars => {
                carList.innerHTML = '';
                cars.forEach(car => {
                    const carItem = document.createElement('div');
                    carItem.className = 'car-item';
                    carItem.textContent = `${car.make} ${car.model} (${car.year})`;
                    carList.appendChild(carItem);
                });
            });
    }

    // Função para adicionar um novo carro
    carForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const make = document.getElementById('car-make').value;
        const model = document.getElementById('car-model').value;
        const year = document.getElementById('car-year').value;

        fetch('/api/cars', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ make, model, year })
        })
        .then(response => response.json())
        .then(() => {
            updateCarList();
            carForm.reset();
        });
    });

    // Inicializa a lista de carros
    updateCarList();
});
