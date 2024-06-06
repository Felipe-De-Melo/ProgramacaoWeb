/*
Curso de Engenharia de Software - UniEVANGÉLICA
Disciplina de Programação Web 
Desenvolvedor: Felipe Fernandes - 2120954 
Data: 04/06/2024 
*/

// Importa os módulos necessários
const express = require('express');
const bodyParser = require('body-parser');

// Cria a aplicação Express
const app = express();
const PORT = 3000;

// Usa body-parser para interpretar JSON no corpo das requisições
app.use(bodyParser.json());

// Base de dados simulada em memória
let cars = [];
let nextId = 1;

// Rotas da API

// Recuperar a lista de carros
app.get('/api/cars', (req, res) => {
    res.json(cars);
});

// Criar um novo carro
app.post('/api/cars', (req, res) => {
    const newCar = { id: nextId++, ...req.body };
    cars.push(newCar);
    res.status(201).json(newCar);
});

// Recuperar informações de um carro específico por ID
app.get('/api/cars/:car_id', (req, res) => {
    const car = cars.find(c => c.id === parseInt(req.params.car_id));
    if (car) {
        res.json(car);
    } else {
        res.status(404).json({ message: 'Carro não encontrado' });
    }
});

// Atualizar informações de um carro específico por ID
app.put('/api/cars/:car_id', (req, res) => {
    const car = cars.find(c => c.id === parseInt(req.params.car_id));
    if (car) {
        Object.assign(car, req.body);
        res.json(car);
    } else {
        res.status(404).json({ message: 'Carro não encontrado' });
    }
});

// Excluir um carro específico por ID
app.delete('/api/cars/:car_id', (req, res) => {
    const carIndex = cars.findIndex(c => c.id === parseInt(req.params.car_id));
    if (carIndex !== -1) {
        cars.splice(carIndex, 1);
        res.status(204).end();
    } else {
        res.status(404).json({ message: 'Carro não encontrado' });
    }
});

// Inicia o servidor
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
