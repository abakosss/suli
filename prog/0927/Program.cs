// See https://aka.ms/new-console-template for more information
using System.Security.Cryptography;

Console.WriteLine("Hello, World!");

int[] tomb = new int[30];

Random rnd = new Random();

for (int i = 0; i < tomb.Length; i++)
{
    tomb[i] = rnd.Next(0, 100);
}

for (int i = 0; i < tomb.Length; i++)
{
    Console.Write(tomb[i] + ", ");
}

Console.WriteLine(Osszeg(tomb));

static int Osszeg(int[] tomb)
{
    int ertek = 0;

    for (int i = 0; i < tomb.Length; i++)
    {
        ertek = ertek + tomb[i];
    }

    return ertek;
}

static bool VanE(int[] tomb){
    int i = 0;

    while (i < tomb.Length && tomb[i] % 5 != 0)
    {
        i++;
    }

    return i < tomb.Length;
}

Console.WriteLine(VanE(tomb));