import Chart from 'chart.js/auto';

const ctxBalance = document.getElementById('account-balance-chart');

new Chart(ctxBalance, {
  type: 'pie',
  data: {
    labels: ['Debits', 'Credits'],
    datasets: [{
      label: 'Account Balance',
      data: [balance_breakdown.debits, balance_breakdown.credits],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
      ],
      hoverOffset: 4
    }]
  },
});

const ctxTypes = document.getElementById('transaction-types-chart');

const labels = transactions_breakdown.map((item) => item.type);
const data = transactions_breakdown.map((item) => item.total);

new Chart(ctxTypes, {
  type: 'pie',
  data: {
    labels: labels,
    datasets: [{
      label: 'Transaction Types',
      data: data,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(153, 102, 255)',
        'rgb(255, 159, 64)',
        'rgb(201, 203, 207)',
        'rgb(123, 31, 162)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
      ],
      hoverOffset: 4
    }]
  },
});