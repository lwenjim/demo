

public class Main
{
    public static void main(String[] args) throws InterruptedException
    {
        TestPrint.main();
    }
}

/**
 * @author qefee
 */
class TestPrint
{

    /**
     * @param args
     */
    public static void main()
    {
        for (int i = 0; i < 100; i++)
        {
            int n = i + 1;
            String s = n + "%";
            System.out.print(n + "%");

            if (i == 99)
            {
                break;
            }

            for (int j = 0; j < s.length(); j++)
            {
                System.out.print('\b');
            }

            waitForSometime(50);
        }
    }

    private static void waitForSometime(int time
                                        /**
                                         * waitForSometime.
                                         *
                                         * @param time
                                         */)
    {
        try
        {
            Thread.sleep(time);
        } catch (InterruptedException e)
        {
            e.printStackTrace();
        }
    }
}