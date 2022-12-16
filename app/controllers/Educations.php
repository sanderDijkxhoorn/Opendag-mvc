<?php
class Educations extends Controller
{

    public function __construct()
    {
        $this->educationModel = $this->model('Education');
    }

    public function index()
    {
        // Get educations
        $educations = $this->educationModel->getEducations();

        // Make the data available in the view
        $rows = '';
        foreach ($educations as $value) {
            $rows .= "<div class='mooieborder'>
                        <tr>
                          <td><img class='mooiedetailfoto' src='" . htmlentities($value->fototjuh, ENT_QUOTES, 'ISO-8859-1') . "' alt='Foto van de opleiding'></td>
                          <div class='mooiedetaildinge'>
                              <td>" . htmlentities($value->naam, ENT_QUOTES, 'ISO-8859-1') . "</td>
                              <br>
                              <td>Niveau: " . htmlentities($value->niffo, ENT_QUOTES, 'ISO-8859-1') . ".</td>
                              <br>
                              <td>" . ($value->isBOL == 1 ? 'Het is een BOL opleiding' : 'Het is een BBL opleiding') . ".</td>
                              <br>
                              <td>De opleiding duurt " . htmlentities($value->duur, ENT_QUOTES, 'ISO-8859-1') . " jaar.</td>
                              <br>
                              <div id='details'>
                                <a href='" . URLROOT . "/educations/details/$value->Id' class='button'>Meer informatie</a>
                              </div>
                          </div>
                        </tr>
                    </div>";
        }

        $data = [
            'educations' => $rows
        ];

        // Load the view
        $this->view('educations/index', $data);
    }

    public function details($id)
    {
        $educations = $this->educationModel->getSingleEducation($id);

        $data = [
            'educations' => $educations
        ];

        $this->view('educations/details', $data);
    }

    public function aanmelden($id)
    {
        // Check if there already is a aanmelding
        if ($this->educationModel->checkEducationChoice($id)) {
            // Update the aanmelding
            $this->educationModel->updateEducationChoice($id);

            $data = [
                'success' => 'Je had al een opleiding gekozen maar deze is nu vervangen met je nieuwe keuze.'
            ];
        } else {
            // Create a new aanmelding
            $this->educationModel->setEducationChoice($id);

            $data = [
                'success' => 'Je hebt je aangemeld voor de opleiding.'
            ];
        }

        // Get the educations
        $data['educations'] = $this->educationModel->getSingleEducation($id);

        $this->view("educations/details", $data);
    }
}
