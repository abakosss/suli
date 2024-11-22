namespace _1112auto;

class Program
{
    static void Main(string[] args)
    {
        string file = "autok2.txt";
        List<Car> kocsilista = new List<Car>();
        
        KocsiFeltoltes(kocsilista, file);
        KocsiKiiratas(kocsilista);
        Console.WriteLine($"Kocsik értéke: {KocsiErtekek(kocsilista, file)} Ft");
        Console.WriteLine($"Legdrágább autó értéke: {LegdragabbAuto(kocsilista, file)} Ft");
        Console.WriteLine($"Legdrágább autó értéke: {LegolcsobbAuto(kocsilista, file)} Ft");
        // KocsiKeresesEvAlapjan(kocsilista, file);
        // KocsiKeresesMarkaAlapjan(kocsilista, file);
        // KocsiKeresesArkategoriaAlapjan(kocsilista, file);
        Console.WriteLine($"Autók átlagára: {KocsiAtlagAr(kocsilista, file)} Ft");
        Console.WriteLine($"Autók összes mennyisége: {KocsiOsszesMennyiseg(kocsilista, file)} db");
        // KocsiKeresesMennyisegAlapjan(kocsilista, file);
        // KocsiKeresesAdottKezdoBetuAlapjan(kocsilista, file);
        Console.WriteLine($"{LeghosszabNevuAuto(kocsilista, file)}");
    }

    static void KocsiKiiratas(List<Car> kocsilista)
    {
        foreach (var car in kocsilista)
        {
            Console.WriteLine(car);
        }
    }

    static void KocsiFeltoltes(List<Car> kocsilista, string file)
    {
        foreach (var sor in File.ReadAllLines(file))
        {
            var data = sor.Split(',');
            
            string make = data[0];
            string model = data[1];
            int.TryParse(data[2], out int year);
            int.TryParse(data[3], out int price);
            int.TryParse(data[4], out int quantity);
            
            Car car = new Car(make, model, year, price, quantity);
            kocsilista.Add(car);
        }
    }

    static int KocsiErtekek(List<Car> kocsilista, string file)
    {
        int ertek = 0;

        foreach (var sor in File.ReadAllLines(file))
        {
            var data = sor.Split(',');
            int ar = int.Parse(data[3]);
            int mennyiseg = int.Parse(data[4]);
            
            ertek += ar * mennyiseg;
        }

        return ertek;
    }

    static int LegdragabbAuto(List<Car> kocsilista, string file)
    {
        int max = 0;
        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');
            if (max < int.Parse(data[3]))
            {
                max = int.Parse(data[3]);
            }
        }

        return max;
    }
    
    static int LegolcsobbAuto(List<Car> kocsilista, string file)
    {
        int min = 999999999;
        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');
            if (min > int.Parse(data[3]))
            {
                min = int.Parse(data[3]);
            }
        }

        return min;
    }

    static void KocsiKeresesEvAlapjan(List<Car> kocsilista, string file)
    {
        Console.WriteLine("Add meg az évet a kereséshez!");
        int felhasznaloEv = int.Parse(Console.ReadLine());

        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');

            if (felhasznaloEv <= int.Parse(data[2]))
            {
                Console.WriteLine(car);
            }
        }
    }
    
    static void KocsiKeresesMarkaAlapjan(List<Car> kocsilista, string file)
    {
        Console.WriteLine("Add meg a márkát a kereséshez!");
        string felhasznaloMarka = Console.ReadLine();

        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');

            if (felhasznaloMarka == data[0])
            {
                Console.WriteLine(car);
            }
        }
    }
    
    static void KocsiKeresesArkategoriaAlapjan(List<Car> kocsilista, string file)
    {
        Console.WriteLine("Add meg a minimum Ft értéket a kereséshez!");
        int felhasznaloMinimumFt = int.Parse(Console.ReadLine());
        Console.WriteLine("Add meg a maximum Ft értéket a kereséshez!");
        int felhasznaloMaximumFt = int.Parse(Console.ReadLine());

        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');

            if (felhasznaloMinimumFt < int.Parse(data[3]) && int.Parse(data[3]) > felhasznaloMaximumFt)
            {
                Console.WriteLine(car);
            }
        }
    }
    
    static long KocsiAtlagAr(List<Car> kocsilista, string file)
    {
        long arak = 0;
        int db = 0;
        long atlag = 0;

        foreach (var sor in File.ReadAllLines(file))
        {
            var data = sor.Split(',');
            int ar = int.Parse(data[3]);
            db++;
            arak += ar;
        }
        atlag = arak / db;
        return atlag;
    }
    
    static long KocsiOsszesMennyiseg(List<Car> kocsilista, string file)
    {
        int maxMennyiseg = 0;
        foreach (var sor in File.ReadAllLines(file))
        {
            var data = sor.Split(',');
            int mennyiseg = int.Parse(data[4]);
            maxMennyiseg += mennyiseg;
        }
        
        return maxMennyiseg;
    }
    
    static void KocsiKeresesMennyisegAlapjan(List<Car> kocsilista, string file)
    {
        Console.WriteLine("Add meg a mennyiséget a kereséshez!");
        int felhasznaloMennyiseg = int.Parse(Console.ReadLine());

        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');

            if (felhasznaloMennyiseg <= int.Parse(data[4]))
            {
                Console.WriteLine(car);
            }
        }
    }
    
    static void KocsiKeresesAdottKezdoBetuAlapjan(List<Car> kocsilista, string file)
    {
        Console.WriteLine("Add meg a kezdőbetűt a kereséshez!");
        char felhasznaloKezdobetu = char.Parse(Console.ReadLine());
    
        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');
    
            if (felhasznaloKezdobetu == data[0].First())
            {
                Console.WriteLine(car);
            }
        }
    }

    static string LeghosszabNevuAuto(List<Car> kocsilista, string file)
    {
        int leghosszabb = 0;
        string kocsi = "";
        foreach (var car in File.ReadAllLines(file))
        {
            var data = car.Split(',');

            if (leghosszabb < data[0].Length)
            {
                leghosszabb += data[0].Length;
            }
            
            if (leghosszabb == data[0].Length)
            {
                kocsi += car;
            }
        }
        return kocsi;
    }
}

class Car
{
    public string Make { get; set; }
    public string Model { get; set; }
    public int Year { get; set; }
    public int Price { get; set; }
    public int Quantity { get; set; }
    
    public Car(string make, string model, int year, int price, int quantity)
    {
        Make = make;
        Model = model;
        Year = year;
        Price = price;
        Quantity = quantity;
    }
    
    public override string ToString()
    {
        return $"{Make} {Model} ({Year}) - Ár: {Price} Ft, Mennyiség: {Quantity}";
    }
}