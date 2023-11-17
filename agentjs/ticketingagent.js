document.addEventListener("DOMContentLoaded", function () {
    const memberFields = document.getElementById("memberFields");
    const generateMembersButton = document.getElementById("generateMembers");

    generateMembersButton.addEventListener("click", function () {
        const memberCountInput = document.getElementById("memberCount");
        const count = parseInt(memberCountInput.value);

        // Clear existing member fields
        memberFields.innerHTML = "";

        for (let i = 1; i <= count; i++) {
            const newMemberField = document.createElement("div");
            newMemberField.classList.add("form-group");
            newMemberField.innerHTML = `
                <label for="memberName${i}">Member ${i} Name</label>
                <input type="text" name="memberName[]" class="form-control" id="memberName${i}" placeholder="Enter member name" required>
            `;
            memberFields.appendChild(newMemberField);
        }
    });
});