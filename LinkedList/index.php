<?php
//SINGLY LINKED LIST

//Each node in the linked list holds some data and a pointer to the next node.
class Node
{
    public $data;
    public $next;
    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class SinglyLinkedList
{

    private $head;

    public function __construct()
    {
        $this->head = null; // Start with an empty list
    }

    // Add a new node to the end of the list
    public function append($data)
    {
        $newNode = new Node($data);

        if ($this->head === null) { // If the list is empty
            $this->head = $newNode;
        } else {
            $current = $this->head;

            // Traverse to the end of the list
            while ($current->next !== null) {
                $current = $current->next;
            }

            $current->next = $newNode;
        }
    }

    // Display the list
    public function display()
    {
        $current = $this->head;

        if ($current === null) {
            echo "The list is empty.\n";
            return;
        }

        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }

        echo "NULL\n";
    }

    // Remove a node by value
    public function remove($data)
    {
        if ($this->head === null) { // List is empty
            return;
        }

        if ($this->head->data === $data) { // Remove the head node
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;

        while ($current->next !== null && $current->next->data !== $data) {
            $current = $current->next;
        }

        if ($current->next !== null) { // Node to remove is found
            $current->next = $current->next->next;
        }
    }

    // Find a node by value
    public function find($data)
    {
        $current = $this->head;

        while ($current !== null) {
            if ($current->data === $data) {
                return $current;
            }

            $current = $current->next;
        }

        return null; // Data not found
    }
}
