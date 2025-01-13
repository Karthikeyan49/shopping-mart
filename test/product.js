document.addEventListener('DOMContentLoaded', () => {
    const table = document.getElementById('productTable');
    const addMemberButton = document.getElementById('addMember');
    const modal = document.getElementById('memberModal');
    const closeModal = document.getElementById('closeModal');
    const confirmAddMember = document.getElementById('confirmAddMember');
    const memberNameInput = document.getElementById('memberName');

    // Hover effect for rows and columns
    table.addEventListener('mouseover', (event) => {
        const cell = event.target.closest('td');
        if (cell) {
            const row = cell.parentElement;
            const colIndex = Array.from(row.children).indexOf(cell);

            row.children[1].classList.add('highlight');
            table.querySelector(`thead tr th:nth-child(${colIndex + 1})`).classList.add('highlight');
        }
    });

    table.addEventListener('mouseout', (event) => {
        const cell = event.target.closest('td');
        if (cell) {
            const row = cell.parentElement;
            const colIndex = Array.from(row.children).indexOf(cell);

            row.children[1].classList.remove('highlight');
            table.querySelector(`thead tr th:nth-child(${colIndex + 1})`).classList.remove('highlight');
        }
    });

    // Handle + and - buttons
    table.addEventListener('click', (event) => {
        const target = event.target;

        if (target.classList.contains('plus') || target.classList.contains('minus')) {
            const box = target.closest('.box');
            const valueSpan = box.querySelector('.value');
            let value = parseInt(valueSpan.textContent, 10);

            if (target.classList.contains('plus')) {
                value += 1;
            } else if (target.classList.contains('minus')) {
                value = Math.max(0, value - 1);
            }

            valueSpan.textContent = value;
        }
    });

    // Open modal on Add Member button click
    addMemberButton.addEventListener('click', () => {
        modal.style.display = 'block';
        memberNameInput.value = ''; // Clear input field
    });

    // Close modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Confirm and add member
    confirmAddMember.addEventListener('click', () => {
        const memberName = memberNameInput.value.trim();
        if (memberName === "") {
            alert("Member name cannot be empty!");
            return;
        }

        const rows = table.querySelectorAll('tbody tr');
        const newHeader = document.createElement('th');
        newHeader.textContent = memberName;
        table.querySelector('thead tr').appendChild(newHeader);

        rows.forEach(row => {
            const newCell = document.createElement('td');
            newCell.className = 'user-cell';
            newCell.setAttribute('data-user', memberName);
            newCell.innerHTML = `<div class="box"><span class="minus">-</span><span class="value">0</span><span class="plus">+</span></div>`;
            row.appendChild(newCell);
        });

        modal.style.display = 'none'; // Close modal after adding
    });

    // Close modal on clicking outside the modal content
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});
