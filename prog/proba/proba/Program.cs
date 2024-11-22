namespace proba;

class Program
{
    static void Main(string[] args)
    {
        int[] tomb = TombGeneralas();
        TombKiiras(tomb);
    }

    static int[] TombGeneralas()
    {
        int[] tomb = new int[10];
        Random rnd = new Random();

        for (int i = 0; i < tomb.Length; i++)
        {
            tomb[i] = rnd.Next(0, 100);
        }

        return tomb;
    }

    static void TombKiiras(int[] tomb)
    {
        for (int i = 0; i < tomb.Length; i++)
        {
            Console.WriteLine(tomb[i]);
        }
    }
}