import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

public class VoteCountSystem {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        // Map to store candidate names and their vote counts
        Map<String, Integer> candidateVotes = new HashMap<>();
        
        // Adding candidates
        candidateVotes.put("Candidate 1", 0);
        candidateVotes.put("Candidate 2", 0);
        candidateVotes.put("Candidate 3", 0);
        
        System.out.println("Welcome to Vote Counting System!");
        System.out.println("List of Candidates:");
        for (String candidate : candidateVotes.keySet()) {
            System.out.println(candidate);
        }
        
        System.out.println("Enter the number of voters: ");
        int numVoters = scanner.nextInt();
        
        // Conducting voting
        for (int i = 1; i <= numVoters; i++) {
            System.out.println("Voter " + i + ", Enter your choice (Candidate Name): ");
            scanner.nextLine(); // Consume newline
            String choice = scanner.nextLine();
            
            // Check if the candidate exists
            if (candidateVotes.containsKey(choice)) {
                candidateVotes.put(choice, candidateVotes.get(choice) + 1);
                System.out.println("Your vote for " + choice + " has been recorded.");
            } else {
                System.out.println("Invalid Candidate! Please enter a valid candidate name.");
                i--; // Decrementing the index to allow the voter to vote again
            }
        }
        
        // Displaying final result
        System.out.println("\nVoting Result:");
        for (Map.Entry<String, Integer> entry : candidateVotes.entrySet()) {
            System.out.println(entry.getKey() + ": " + entry.getValue() + " votes");
        }
        
        // Finding the winner
        int maxVotes = Integer.MIN_VALUE;
        String winner = "";
        for (Map.Entry<String, Integer> entry : candidateVotes.entrySet()) {
            if (entry.getValue() > maxVotes) {
                maxVotes = entry.getValue();
                winner = entry.getKey();
            } else if (entry.getValue() == maxVotes) {
                // Handle tie case
                winner += ", " + entry.getKey();
            }
        }
        System.out.println("\nWinner(s): " + winner + " with " + maxVotes + " votes.");
        
        scanner.close();
    }
}
