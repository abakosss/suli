// See https://aka.ms/new-console-template for more information

using System.Net.NetworkInformation;
using System.Reflection.Metadata.Ecma335;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;

int[] tomb = new int[10];
int[] tombKivalasztas = { 0, 1, 5, 3, 4, 2, 6, 7, 8, 9, 10 };
int[] feladat7tomb = new int[5];
int[] feladat7tombMasoltTomb = new int[feladat7tomb.Length];
string[] feladat9Honapok = {"Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"};
Random rnd = new Random();

Console.WriteLine("Tömb:");
for (int i = 0; i < tomb.Length; i++)
{
    tomb[i] = rnd.Next(1, 10);
    Console.Write(tomb[i] + ", ");
}

Console.WriteLine("");
Console.WriteLine("Rendezett tömb:");
EgyszeruCseresRendezes(tomb);
for (int i = 0; i < tomb.Length; i++)
{
    Console.Write(tomb[i] + ", ");
}

Console.WriteLine("");
Console.WriteLine("Tömb elemeinek összege: " + Sorozatszamitas(tomb));
Console.WriteLine("Szerepel-e benne 5-tel osztható szám? " + Eldontes(tomb));
Console.WriteLine("A tombKivalasztas tömb: ");
for (int i = 0; i < tombKivalasztas.Length; i++)
{
    Console.Write(tombKivalasztas[i] + ", ");
}
Console.WriteLine("");
Console.WriteLine("5-ös szám indexxe a tombKivalasztas tömbben: " + Kivalasztas(tombKivalasztas));
Console.WriteLine("Van-e a tömbben 5-tel osztható szám, és ha igen, mi az indexe? " + Lineariskereses(tomb));
Console.WriteLine("5-tel osztható számok darabszáma: " + Megszamlalas(tomb));
Console.WriteLine("A tömb legkisebb értéke: " + Maximumkivalasztas(tomb));
feladat7(feladat7tomb);
feladat7tombMasolas(feladat7tomb, feladat7tombMasoltTomb);
feladat9(feladat9Honapok);

//0. feladat: növekvő sorrend

static void EgyszeruCseresRendezes(int[] tomb)
{
    for (int i = 0; i < tomb.Length; i++)
    {
        for (int j = i + 1; j < tomb.Length; j++)
        {
            if (tomb[i] > tomb[j])
            {
                int tombi = tomb[i];
                tomb[i] = tomb[j];
                tomb[j] = tombi;
            }
        }
    }
}

//1. feladat: Sorozatszámítás tétel

static int Sorozatszamitas(int[] tomb)
{
    int ertek = 0;

    for (int i = 0; i < tomb.Length; i++)
    {
        ertek += tomb[i];
    }
    return ertek;
}

//2. feladat: Eldöntés tétel

static bool Eldontes(int[] tomb)
{
    int i = 1;
    while (i < tomb.Length && tomb[i] % 5 != 0)
    {
        i++;
    }
    return i < tomb.Length;
}

//3. feladat: Kiválasztás tétel

static int Kivalasztas(int[] tombKivalasztas)
{
    int i = 1;
    while (5 != tombKivalasztas[i])
    {
        i++;
    }
    int idx = i;
    return idx;
}

//4. feladat: Lineáris keresés tétel

static (bool van, int idx) Lineariskereses(int[] tomb)
{
    int i = 1;
    while (i < tomb.Length && tomb[i] % 5 != 0)
    {
        i++;
    }

    bool van = i < tomb.Length;
    if (van)
    {
        int idx = i;
        return (van, idx);
    }
    else
    {
        return (van, -1);
    }
}

//5. feladat: Megszámlálás tétel

static int Megszamlalas(int[] tomb)
{
    int db = 0;
    for (int i = 0; i < tomb.Length; i++)
    {
        if (tomb[i] % 5 == 0)
        {
            db++;
        }
    }
    return db;
}

//6. feladat: Maximumkiválasztás tétel

static int Maximumkivalasztas(int[] tomb)
{
    int max = tomb.Length;
    for (int i = 0; i < tomb.Length; i++)
    {
        if (tomb[i] < max)
        {
            max = tomb[i];
        }
    }
    return max;
}

//7. feladat

static void feladat7(int[] feladat7tomb){
    bool negativ = false;
    bool pozitiv = false;
    bool zerus = false;
    int zerusdb = 0;
    int negativOsszeg = 0;
    int db = 0;
    int pozitivOsszeg = 0;
    int atlag = 0;
    for (int i = 0; i < feladat7tomb.Length; i++)
    {
        Console.Write("Add meg a 7-es feladat tömbjének " + i + ". elemét: ");
        feladat7tomb[i] += int.Parse(Console.ReadLine());
        if (feladat7tomb[i] < 0)
        {
            negativOsszeg += feladat7tomb[i];
            negativ = true;
        }
        else if( feladat7tomb[i] == 0){
            zerus = true;
            zerusdb++;
        }
        else
        {
            pozitiv = true;
            db++;
            pozitivOsszeg += feladat7tomb[i];
            atlag = pozitivOsszeg / db;
        }
    }

    Console.WriteLine("7-es feladat tömbje:");

    for (int i = 0; i < feladat7tomb.Length; i++)
    {
        Console.Write(feladat7tomb[i] + ", ");
    }

    Console.WriteLine("");

    if (negativ)
    {
        Console.WriteLine("Negatív számok összege: " + negativOsszeg);
    }
    else
    {
        Console.WriteLine("Nincsen negatív szám a tömbben.");
    }

    if (pozitiv)
    {
        Console.WriteLine("Pozitív számok átlaga: " + atlag);
    }
    else
    {
        Console.WriteLine("Nincsen pozitív szám a tömbben.");
    }

    if (zerus)
    {
        Console.WriteLine("Zérusok darabszáma: " + zerusdb);
    }
    else
    {
        Console.WriteLine("Nincsen zérus a tömbben.");
    }
}

//8. feladat

static void feladat7tombMasolas(int[] feladat7tomb, int[] feladat7tombMasoltTomb){
    for (int i = 0; i < feladat7tomb.Length; i++)
    {
        if (feladat7tomb[i] > 0)
        {
            feladat7tombMasoltTomb[i] += feladat7tomb[i];
        }
    }

    Console.WriteLine("Másolt tömb: ");

    for (int i = 0; i < feladat7tombMasoltTomb.Length; i++)
    {
        Console.Write(feladat7tombMasoltTomb[i] + ", ");
    }
    Console.WriteLine("");
}

//9. feladat

static void feladat9(string[] feladat9Honapok){
    bool sikerult = false;
    while (!sikerult)
    {
        Console.WriteLine("Adj meg egy hónapnevet!");
        string honapnev = Console.ReadLine();
        if (feladat9Honapok.Contains(honapnev))
        {
            sikerult = true;
        }
    }
    Console.WriteLine("Eltaláltad!");
}