<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chuyển đổi Markdown</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
    integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <div class="grid grid-cols-2 gap-2 h-screen ">
    <div class="border-r">
      <textarea id="markdown" class="w-full h-full outline-none"></textarea>
    </div>
    <div>
      <div id="html" class="prose">
      </div>
    </div>
  </div>
  <script>
    let convert = () => {
      let markdown = document.querySelector('#markdown').value

      axios.post('./handle.php', {
        markdown
      }).then(res => {
        document.querySelector('#html').innerHTML = res.data
      })

      localStorage.setItem('markdown', markdown)
    }

    let init = () => {
      document.querySelector('#markdown').value = localStorage.getItem('markdown')
      setInterval(convert, 2000);
    }
    init();
  </script>
</body>

</html>