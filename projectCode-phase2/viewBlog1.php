<script type="text/javascript">
  window.onload = function() {
  document.getElementById('monthSelect').addEventListener('change', function() {
  var month = this.value;
  var entries = <?php echo json_encode($entriesByMonth); ?>;
  var container = document.getElementById('entriesContainer');

  // Clear the container
  while (container.firstChild) {
    container.removeChild(container.firstChild);
  }

  // Function to create an entry
  function createEntry(entry) {
  var div = document.createElement('div');
  div.className = 'entry';

  var pTime = document.createElement('p');
  pTime.id = 'time';
  pTime.textContent = 'Posted on: ' + entry.dates + ' at ' + entry.times;
  div.appendChild(pTime);

  var pTitle = document.createElement('p');
  pTitle.id = 'blogTitle';
  pTitle.textContent = entry.title;
  div.appendChild(pTitle);

  var pText = document.createElement('p');
  pText.id = 'blogText';
  pText.textContent = entry.description;
  div.appendChild(pText);

  var hr = document.createElement('hr');
  div.appendChild(hr);

  return div;
  }

  // If the selected value is not empty, show the entries for the selected month
  if (month) {
    entries[month].forEach(function(entry) {
      var div = createEntry(entry);
      container.appendChild(div);
    });
  } else {
    // If the selected value is empty, show all entries
    Object.values(entries).flat().forEach(function(entry) {
      var div = createEntry(entry);
      container.appendChild(div);
        });
      }
    });
  }
</script>