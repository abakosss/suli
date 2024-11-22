using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

class Diak
{
    private string Nev;
    private int Kor;
    private double Atlag;

    public Diak(string nev_, int kor_, double atlag_)
    {
        Nev = nev_;
        Kor = kor_;
        Atlag = atlag_;
    }

    public string NevVissza()
    {
        return Nev;
    }
    public int KorVissza()
    {
        return Kor;
    }
    public double AtlagVissza() {
        return Atlag;
    }


}

namespace OOP_private_adattagok
{
    class Program
    {
        static void Main(string[] args)
        {
            string file = "adatok.txt";
            List<Diak> tanulok = BeolvasAdatok(file);
            ListazAdatok(tanulok);
            //Legmagasabb átlagú diák neve
            Console.WriteLine($"A legnagyobb átlagú diák neve: " + MaxAtlagDiak(tanulok));
            //Legfiatalabb diák neve
            Console.WriteLine($"A legfiatalabb diák neve: " + LegfiatalabbDiak(tanulok));
            //Átlag átlag
            Console.WriteLine($"Átlagos átlag: " +AtlagosAtlag(tanulok));
            //ÁTlagok szerint a diáok száma
            AtlagokSzerintiDiakok(tanulok);
            //Életkorok szerinti diákok száma
            DiakokSzamaEletkoronkent(tanulok);
            //Diákok nevei fordított sorrendben
            Forditott(tanulok);
            //Átlagos életkor
            ForditottABC(tanulok);
            //Átlagos életkor
            Console.WriteLine($"Átlagos életkor: " + AtlagosEletkor(tanulok));


            Console.ReadKey();
        }

        static List<Diak> BeolvasAdatok(string filename)
        {
            List<Diak> tanulok = new List<Diak>();

            try
            {
                StreamReader f = new StreamReader(filename);
                string sor;
                f.ReadLine();
                while ((sor = f.ReadLine()) != null)
                {
                    string[] resz = sor.Split(';');
                    string nev = resz[0];
                    int kor = int.Parse(resz[1]);
                    double atlag = double.Parse(resz[2]);
                    tanulok.Add(new Diak(nev, kor, atlag));

                }

            }
            catch (Exception e){
                Console.WriteLine("Hiba a beolvasásakor" + e.Message);
           
            }
            return tanulok;
        }

        static void ListazAdatok(List<Diak> tanulok)
        {
            int i = 0;
            foreach (var adat in tanulok)
            {
                Console.WriteLine($"Név: {adat.NevVissza()} Kor: {adat.KorVissza()} Átlag: {adat.AtlagVissza()}");
                i++;
            }

            Console.WriteLine($"A diákok száma: {i}");

        }

        static string MaxAtlagDiak(List<Diak> tanulok)
        {
            string legjobb_tanulo = "";
            double max_atlag=0.0;
            foreach (var at in tanulok)
               
            {
                if (at.AtlagVissza() > max_atlag) {
                    max_atlag = at.AtlagVissza();
                    legjobb_tanulo = at.NevVissza();
                }
           
            }

            return legjobb_tanulo;
        }

        static string LegfiatalabbDiak(List<Diak> tanulok)
        {
            string legfiatalabb_tanulo = "";
            double min_kor = 100;
            foreach (var at in tanulok)

            {
                if (at.KorVissza() < min_kor)
                {
                    min_kor = at.KorVissza();
                   legfiatalabb_tanulo = at.NevVissza();
                }

            }

            return legfiatalabb_tanulo;
        }

        static double AtlagosAtlag(List<Diak> tanulok)
        {
            double atlagos_atlag = 0.0;
            double osszeg = 0.0;
            int db = 0;
            foreach (var atl in tanulok)
            {
                osszeg += atl.AtlagVissza();
                db++;
            }
            atlagos_atlag = Math.Round(osszeg / db,2);

            return atlagos_atlag;
        }

        static void AtlagokSzerintiDiakok(List<Diak> tanulok)
        {
            var atlagokSzama = new Dictionary<double, int>();
            foreach (var tan in tanulok)
            {
                if (atlagokSzama.ContainsKey(tan.AtlagVissza()))
                {
                    atlagokSzama[tan.AtlagVissza()]++;
                }
                else {
                    atlagokSzama[tan.AtlagVissza()] = 1;
                }
           
            }

            foreach (var at in atlagokSzama)
            {
                Console.WriteLine($"{at.Key} osztályzat ${at.Value} diák");
            }
       
       
        }

        static void DiakokSzamaEletkoronkent(List<Diak> tanulok)
        {

            var korokSzama = new Dictionary<int, int>();
            foreach (var tan in tanulok)
            {
                if (korokSzama.ContainsKey(tan.KorVissza()))
                {
                   korokSzama[tan.KorVissza()]++;
                }
                else
                {
                    korokSzama[tan.KorVissza()] = 1;
                }

            }

            foreach (var at in korokSzama)
            {
                Console.WriteLine($"{at.Key} életkor ${at.Value} diák");
            }



        }







        static void Forditott(List<Diak> tanulok)
        {
            tanulok.Sort((x, y) => x.NevVissza().CompareTo(y.NevVissza()));
            ListazAdatok(tanulok);



        }

        static void ForditottABC(List<Diak> tanulok)
        {
            tanulok.Sort((x, y) => y.NevVissza().CompareTo(x.NevVissza()));
            ListazAdatok(tanulok);



        }


        static double AtlagosEletkor(List<Diak> tanulok)
        {
            double atlagos_kor = 0;
            double osszeg = 0;
            int db = 0;
            foreach (var atl in tanulok)
            {
                osszeg += atl.KorVissza();
                db++;
            }
            atlagos_kor = Math.Round(osszeg / db, 2);

            return atlagos_kor;
        }




    }
}