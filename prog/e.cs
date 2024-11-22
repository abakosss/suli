namespace _1022;

class Program
{
    static void Main(string[] args)
    {
        string szoveg = SzovegBekeres();
        Console.WriteLine(EszperenteConvert(szoveg));
    }

    static string SzovegBekeres()
    {
        Console.WriteLine("Adj meg egy szöveget!");
        string szoveg = Console.ReadLine();

        return szoveg;
    }

    static string EszperenteConvert(string szoveg)
    {
        char[] maganhangzok = { 'a', 'á', 'e', 'é', 'i', 'í', 'o', 'ó', 'ö', 'ő', 'u', 'ú', 'ü', 'ű',
            'A', 'Á', 'E', 'É', 'I', 'Í', 'O', 'Ó', 'Ö', 'Ő', 'U', 'Ú', 'Ü', 'Ű' };
        char[] eszperenteString = new char[szoveg.Length];
        for (int i = 0; i < szoveg.Length; i++)
        {
            char currentChar = szoveg[i];
            
            // Ha a karakter magánhangzó, kis vagy nagy 'e'-re cseréljük
            if (Array.Exists(maganhangzok, element => element == currentChar))
            {
                eszperenteString[i] = 'e';
            }
            else
            {
                eszperenteString[i] = currentChar; // Ha nem magánhangzó, marad az eredeti karakter
            }
        }


        return new string(eszperenteString);
        //árvíztűrő tükörfúrógép
    }
}