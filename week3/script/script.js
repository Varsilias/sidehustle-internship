form = document.querySelector('form');
input = document.querySelector('#todo');
alert = document.querySelector('#alert');

form.addEventListener('submit', function(e) {
    // e.preventDefault();
    let inputValue = input.value
    let data = inputValue.trim();

    if (data === '' || data === null) {
        input.classList.add('input-error');
        // alert.textContent = 'You did not make a valid input';
        alert.classList.add('error-message');
        console.log('empty');
    } else {
        input.classList.remove('input-error');
        alert.classList.remove('error-message');
        alert.classList.add('success-message');
        console.log(data);
    }
});

// async function sendTodo(params) {
//     const response = fetch('../src/handleInsert.php', {
//         method: 'POST'
//     })
// }