<?php

namespace App\Helper;

class Saw
{

	protected $alternatifs;
	protected $kriterias;
	protected $evaluasies;
    protected $tableClass;

    public function hitungSaw($kriterias, $alternatifs, $evaluasies, $tableClass = null)
    {
        $this->setAlternatifs($alternatifs);
        $this->setKriterias($kriterias);
        $this->setEvaluasies($evaluasies);

        if ($tableClass) {
            $this->setTableClass($tableClass);
        }else{
            $this->setTableClass("display nowrap table table-hover table-striped table-bordered");
        }

        $this->hitungMatriksTernormalisasi();
        $this->hitungNilaiPreferensi();
    }

    private function hitungMatriksTernormalisasi()
    {
        $nilai = 0;
        foreach ($this->getKriterias() as $key => $row) {
            unset($nilai);
            if ($row->atribut == 'benefit') {
                $nilai = $this->getEvaluasies()->where('kriteria_id', $row->id)->max('nilai');
            }else{
                $nilai = $this->getEvaluasies()->where('kriteria_id', $row->id)->min('nilai');
            }
            foreach ($this->getEvaluasies()->where('kriteria_id', $row->id) as $k => $r) {
                if ($row->atribut == 'benefit') {
                    $this->evaluasies[$k]->matriksTernormalisasi = $r->nilai / $nilai;
                }else{
                    $this->evaluasies[$k]->matriksTernormalisasi = $nilai / $r->nilai;
                }
            }
        }
    }

    private function hitungNilaiPreferensi()
    {
        foreach ($this->getAlternatifs() as $key => $row) {
            $this->alternatifs[$key]->nilaiPreferensi = 0;
            foreach ($this->getKriterias() as $k => $r) {
                $this->alternatifs[$key]->nilaiPreferensi += $this->getEvaluasies()->where('alternatif_id', $row->id)->where('kriteria_id', $r->id)->first()->matriksTernormalisasi * $r->bobot;
            }
        }
    }

    public function getKriteriaTable()
    {
        $return = "<div class='table-responsive'><table class='".$this->getTableClass()."'><thead><tr><th>Kode Kriteria</th><th>Kriteria</th><th>Bobot</th><th>Atribut</th></tr>";

        foreach ($this->getKriterias() as $key => $row) {
            $return .= "<tr><td>".$row->kode_kriteria."</td><td>".$row->kriteria."</td><td>".$row->bobot."</td><td>".$row->atribut."</td></tr>";
        }

        return $return .= "</table></div>";
    }

	public function getRatingKecocokanTable()
	{
		$return = "<div class='table-responsive'><table class='".$this->getTableClass()."'><thead><tr><th rowspan='2'>Alternatif</th><th colspan='".$this->getKriterias()->count()."'>Kriteria</th></tr><tr>";
		foreach ($this->getKriterias() as $key => $row) {
			$return .= "<th>".$row->kode_kriteria."</th>";
		}
		$return .= "</tr></thead>";
		foreach ($this->getAlternatifs() as $key => $row) {
            $return .= "<tr>";
			$return .= "<td>".$row->alternatif."</td>";
            foreach ($this->getKriterias() as $k => $r) {
                $return .= "<td>".$this->getEvaluasies()->where('alternatif_id', $row->id)->where('kriteria_id', $r->id)->first()->nilai."</td>";
            }
			$return .= "</tr>";
		}

		return $return .= "</table></div>";
	}

    public function getMatriksTernormalisasiTable()
    {
        $return = "<div class='table-responsive'><table class='".$this->getTableClass()."'><thead><tr><th rowspan='2'>Alternatif</th><th colspan='".$this->getKriterias()->count()."'>Kriteria</th></tr><tr>";
        foreach ($this->getKriterias() as $key => $row) {
            $return .= "<th>".$row->kode_kriteria."</th>";
        }
        $return .= "</tr></thead>";
        foreach ($this->getAlternatifs() as $key => $row) {
            $return .= "<tr>";
            $return .= "<td>".$row->alternatif."</td>";
            foreach ($this->getKriterias() as $k => $r) {
                $return .= "<td>".$this->getEvaluasies()->where('alternatif_id', $row->id)->where('kriteria_id', $r->id)->first()->matriksTernormalisasi."</td>";
            }
            $return .= "</tr>";
        }

        return $return .= "</table></div>";
    }

    public function getNilaiPreferensiTable()
    {
        $return = "<div class='table-responsive'><table class='".$this->getTableClass()."'><thead><tr><th>Section</th><th>Alternatif</th><th>Nilai Preferensi</th></tr></thead>";

        foreach ($this->getAlternatifs() as $key => $row) {
            $return .= "<tr>";
            $return .= "<td>".$row->section->section."</td>";
            $return .= "<td>".$row->alternatif."</td>";
            $return .= "<td>".$row->nilaiPreferensi."</td>";
            $return .= "</tr>";
        }

        return $return .= "</table></div>";
    }

    public function getPerangkinganTable($only_section = false)
    {
        $return = "<div class='table-responsive'><table id='table-hasil' class='".$this->getTableClass()."'><thead><tr><th>Section</th><th>Alternatif</th><th>Nilai Preferensi</th></tr></thead>";

        $listed_hr = array();

        foreach ($this->getAlternatifs()->sortByDesc('nilaiPreferensi') as $key => $row) {
            if($only_section)
            {
                if(in_array($row->section->section, $listed_hr))
                {
                    continue;
                }
                else
                {
                    $listed_hr[] = $row->section->section;
                }
            }
            $return .= "<tr>";
            $return .= "<td>".$row->section->section."</td>";
            $return .= "<td>".$row->alternatif."</td>";
            $return .= "<td>".$row->nilaiPreferensi."</td>";
            $return .= "</tr>";
        }

        return $return .= "</table></div>";
    }

    /**
     * @return mixed
     */
    public function getAlternatifs()
    {
        return $this->alternatifs;
    }

    /**
     * @param mixed $alternatifs
     *
     * @return self
     */
    public function setAlternatifs($alternatifs)
    {
        $this->alternatifs = $alternatifs;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKriterias()
    {
        return $this->kriterias;
    }

    /**
     * @param mixed $kriterias
     *
     * @return self
     */
    public function setKriterias($kriterias)
    {
        $this->kriterias = $kriterias;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvaluasies()
    {
        return $this->evaluasies;
    }

    /**
     * @param mixed $evaluasies
     *
     * @return self
     */
    public function setEvaluasies($evaluasies)
    {
        $this->evaluasies = $evaluasies;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTableClass()
    {
        return $this->tableClass;
    }

    /**
     * @param mixed $tableClass
     *
     * @return self
     */
    public function setTableClass($tableClass)
    {
        $this->tableClass = $tableClass;

        return $this;
    }

}
