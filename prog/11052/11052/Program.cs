namespace _11052;

class Program
{
    static void Main(string[] args)
    {
        Dictionary<string, int> szotar = new Dictionary<string, int>();
        szotar.Add("kutya", 10);
        szotar.Add("macska", 20);
        szotar.Add("eger", 13);

        Dictionary<string, int> szotar2 = new Dictionary<string, int>()
        {
            {"alma",30},
            {"korte",50},
            {"dinnye",70}
        };

        szotar.OrderBy(x => x.Value);

        foreach (var a in szotar)
        {
            Console.WriteLine($"Kulcs: {a.Key}, Érték: {a.Value}");
        }
    }
}