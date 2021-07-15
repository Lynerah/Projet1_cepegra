<?php require('config.php');?>
<?php include("header.php");?>
<?php
//INSERT
    if(isset($_POST['add_visite'])):
        // $sql = "INSERT INTO `news` (`titre`, `contenu`) VALUES ('.$_POST['titre].', '.$_POST['contenu].')';"

        echo $sql = sprintf("INSERT INTO `visiteur` (`firstname`, `lastname`) VALUES ('%s', '%s')",
        addslashes($_POST['firstname']),
        addslashes($_POST['lastname'])
        );
        // exit;
        $connect->query($sql);
        echo $connect->error;
        $last_id = $connect->insert_id;
        $retour_page = $_SERVER['HTTP_REFERER'];
        header('location:$retour_page');
    endif;
?>
<main>
    <div>
      <h2>Bienvenue au Cepegra</h2>
    </div>
    <div>
      <form action="" method="post" class="form-visite">
        <fieldset
        id="step_1"
        class="step stepsgroup_1 activestep"
      >
        <div class="column">
        <input type="file" accept="image/*" capture="user" onchange="loadFile(event)">
        <img id="output">
        <script type="text/javascript">
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        </div>
        <div class="columns">
            <!-- Nom -->
            <div class="field">
              <label class="label">Nom</label>
              <div class="control">
                <input
                  class="input" name="lastname"
                  type="text"
                  placeholder="Text input"
                />
              </div>
            </div>
            <!-- Prenom -->
            <div class="field">
              <label class="label">Prénom</label>
              <div class="control">
                <input
                  class="input" name="firstname"
                  type="text"
                  placeholder="Text input"
                />
              </div>
            </div>

            <!-- Email -->
            <div class="field">
              <label class="label">Email</label>
              <div
                class="control has-icons-left has-icons-right"
              >
                <input
                  class="input is-danger" name="mail"
                  type="email"
                  placeholder="Email input"
                />
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
              </div>
              <p class="help is-danger">Ce mail est invalide</p>
            </div>
          </div>
        </div>
        <!-- <div class="field is-grouped is-grouped-centered">
          <div class="control">
            <a
              href="http://localhost/cepegra-welcome2/#step_2"
              class="
                steplink
                nextsteplink
                button
                is-success is-rounded
              "
              >Next <i class="fas fa-chevron-right"></i
            ></a>
          </div>
        </div> -->
      </fieldset>
      <fieldset id="step_2" class="step stepsgroup_1">
        <!-- Raison -->
        <div class="field">
          <label class="label">Raison de votre visite</label>
          <div class="control">
            <div class="select">
              <select class="switchselector">
                <option disabled="" selected="">
                  Selectionnez
                </option>
                <option data-target="#formation">
                  Suivre une formation
                </option>
                <option data-target="#personfinder">
                  Rendez-vous avec un membre du personnel
                </option>
              </select>
            </div>
          </div>
        </div>

        <!-- Qui rencontrer -->

        <div class="field dropdown " id="personfinder">
          <div class="dropdown-trigger">
            <label class="label"
              >Qui souhaitez vous rencontrer</label
            >
            <div class="control has-icons-left has-icons-right">
                <input type="text" class="keywords input personnel-name" placeholder="Adam Smith"
                value="">
                <input type="hidden" class="userKay">
                <ul class="serp list hidden">
                </ul>
           
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-check "></i>
              </span>
            </div>
          </div>
          <div class="dropdown-menu" role="menu">
            <div class="dropdown-content"></div>
          </div>
        </div>

        <!-- Formation -->
        <div class="field " id="formation">
          <label class="label">Formation que vous suivez</label>
          <div class="control">
            <div class="select">
              <select class="lessons-selecter">
            
              </select>
            
            </div>
          </div>
        </div>

        <!-- Submit -->
        <div class="field is-grouped is-grouped-centered">
          <!-- <div class="control">
            <a
              href="http://localhost/cepegra-welcome2/#step_1"
              class="steplink button is-rounded"
              ><i class="fas fa-chevron-left"></i>&nbsp;Back</a
            >
          </div>
          <div class="control">
            <button class="button is-danger is-rounded">
              <i class="fas fa-times"></i>&nbsp;Annuler
            </button>
          </div> -->

          <div class="control">
            <input type="hidden" name="add_visite">
            <button class="button btnSubmit is-success is-rounded">
              Envoyer
            </button>
          </div>
        </div>
      </fieldset>
      </form>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script src="./src/index.js"></script>
  <script src="./src/autocomplete.js"></script>

<?php include("footer.php");?>
<?php //include("debug.php");?>