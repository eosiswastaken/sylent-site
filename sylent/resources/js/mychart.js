import Chart from 'chart.js/auto';

const formData = JSON.parse(document.getElementById('form-data').textContent);

// Identifier le dernier formulaire
const lastForm = formData[formData.length - 1];

const responsesData_lastform = {
    clarity: [],
    teaching_methods: [],
    educational_resources: [],
    continuous_assessment: [],
    tutor_interaction: [],
    overall_satisfaction: []
};

lastForm.questions.forEach(question => {
    if (question.title_question !== 'email' && question.title_question !== 'comments') {
        responsesData_lastform[question.title_question].push(...question.responses.map(response => parseInt(response.response)));
    }
});

Object.entries(responsesData_lastform).forEach(([questionType, responses]) => {
    const responseTotals = [0, 0, 0, 0];
    responses.forEach(response => {
        responseTotals[response - 1]++;
    });

    const canvasId = `myChart_lastform-${questionType}`;

    const canvas = document.getElementsByName('canvas');
    canvas.id = canvasId;

    const ctx = document.getElementById(canvasId).getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pas satisfait', 'Peu satisfait', 'Assez satisfait', 'Très satisfait'],
            datasets: [{
                label: `${questionType}`,
                data: responseTotals,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1
                    },
                    beginAtZero: true
                }
            }
        }
    });
    myChart.canvas.parentNode.style.height = '500px';
    myChart.canvas.parentNode.style.width = '500px';
});

//-----------------------------------------------------

const responsesData = {
    clarity: [],
    teaching_methods: [],
    educational_resources: [],
    continuous_assessment: [],
    tutor_interaction: [],
    overall_satisfaction: []
};

formData.forEach(form => {
    form.questions.forEach(question => {
        if (question.title_question !== 'email' && question.title_question !== 'comments') {
            responsesData[question.title_question].push(...question.responses.map(response => parseInt(response.response)));
        }
    });
});

Object.entries(responsesData).forEach(([questionType, responses]) => {
    const responseTotals = [0, 0, 0, 0];
    responses.forEach(response => {
        responseTotals[response - 1]++;
    });

    const canvasId = `myChart-${questionType}`;

    const canvas = document.getElementsByName('canvas');
    canvas.id = canvasId;

    const ctx = document.getElementById(canvasId).getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pas satisfait', 'Peu satisfait', 'Assez satisfait', 'Très satisfait'],
            datasets: [{
                label: `${questionType}`,
                data: responseTotals,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1
                    },
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    label: {
                        color: 'green' // Modifier la couleur des étiquettes ici
                    }
                }
            }
        }
    });
    myChart.canvas.parentNode.style.height = '500px';
    myChart.canvas.parentNode.style.width = '500px';
});

