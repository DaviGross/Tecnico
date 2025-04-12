let tasks = JSON.parse(localStorage.getItem("tasks")) || [];

const taskList = document.getElementById("taskList");
const input = document.getElementById("taskInput");
const addBtn = document.getElementById("addBtn");
const categorySelect = document.getElementById("category");
const dueDateInput = document.getElementById("dueDate");

function saveTasks() {
  localStorage.setItem("tasks", JSON.stringify(tasks));
}

function renderTasks(filter = "all") {
  taskList.innerHTML = "";

  const sortedTasks = [...tasks].sort((a, b) => a.done - b.done);

  sortedTasks.forEach((task, index) => {
    if (filter === "pending" && task.done) return;
    if (filter === "done" && !task.done) return;

    const li = document.createElement("li");
    if (task.done) li.classList.add("done");

    const span = document.createElement("span");
    span.textContent = task.text;
    span.contentEditable = true;

    span.addEventListener("blur", () => {
      tasks[index].text = span.textContent.trim();
      saveTasks();
    });

    li.appendChild(span);

    const meta = document.createElement("div");
    meta.className = "meta";
    meta.textContent = `${task.category} | Vence: ${task.dueDate}`;
    li.appendChild(meta);

    li.addEventListener("click", () => {
      tasks[index].done = !tasks[index].done;
      saveTasks();
      renderTasks(filter);
    });

    const removeBtn = document.createElement("button");
    removeBtn.textContent = "X";
    removeBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      tasks.splice(index, 1);
      saveTasks();
      renderTasks(filter);
    });

    li.appendChild(removeBtn);
    taskList.appendChild(li);
  });

  updateCounters();
}

function updateCounters() {
  document.getElementById("totalTasks").textContent = `Total: ${tasks.length}`;
  document.getElementById("completedTasks").textContent = `Concluídas: ${tasks.filter(t => t.done).length}`;
}

function addTask() {
  const text = input.value.trim();
  const category = categorySelect.value;
  const dueDate = dueDateInput.value;

  if (!text) return;

  tasks.push({
    text,
    category,
    dueDate,
    done: false
  });

  input.value = "";
  dueDateInput.value = "";

  saveTasks();
  renderTasks();
}

function clearAllTasks() {
  if (confirm("Tem certeza que deseja apagar todas as tarefas?")) {
    tasks = [];
    saveTasks();
    renderTasks();
  }
}

function filterTasks(status) {
  renderTasks(status);
}

function toggleDarkMode() {
  document.body.classList.toggle("dark");
  localStorage.setItem("darkMode", document.body.classList.contains("dark"));
}

addBtn.addEventListener("click", addTask);

// Ativar modo escuro se estiver salvo
if (localStorage.getItem("darkMode") === "true") {
  document.body.classList.add("dark");
}

renderTasks();