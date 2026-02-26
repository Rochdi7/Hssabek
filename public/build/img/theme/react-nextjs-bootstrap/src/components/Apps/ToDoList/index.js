"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import AddNewTask from "./AddNewTask";

const toDoListData = [
  {
    id: "#854",
    taskTitle: "Network Infrastructure",
    assignedTo: "Oliver Clark",
    dueDate: "30 Apr 2024",
    priority: "High",
    status: "finished",
  },
  {
    id: "#853",
    taskTitle: "Cloud Migration",
    assignedTo: "Ethan Baker",
    dueDate: "25 Apr 2024",
    priority: "Low",
    status: "pending",
  },
  {
    id: "#852",
    taskTitle: "Website Revamp",
    assignedTo: "Sophia Carter",
    dueDate: "20 Apr 2024",
    priority: "Medium",
    status: "inProgress",
  },
  {
    id: "#851",
    taskTitle: "Mobile Application",
    assignedTo: "Ava Cooper",
    dueDate: "15 Apr 2024",
    priority: "High",
    status: "finished",
  },
  {
    id: "#850",
    taskTitle: "System Deployment",
    assignedTo: "Isabella Evans",
    dueDate: "10 Apr 2024",
    priority: "Low",
    status: "cancelled",
  },
  {
    id: "#849",
    taskTitle: "Hotel Management System",
    assignedTo: "Shawn Kennedy",
    dueDate: "30 Apr 2024",
    priority: "High",
    status: "finished",
  },
  {
    id: "#848",
    taskTitle: "Send Proposal to APR Ltd",
    assignedTo: "Roberto Cruz",
    dueDate: "25 Apr 2024",
    priority: "Low",
    status: "pending",
  },
  {
    id: "#847",
    taskTitle: "Python Upgrade",
    assignedTo: "Juli Johnson",
    dueDate: "20 Apr 2024",
    priority: "Medium",
    status: "inProgress",
  },
  {
    id: "#846",
    taskTitle: "Schedule meeting with Trezo",
    assignedTo: "Catalina Engles",
    dueDate: "15 Apr 2024",
    priority: "High",
    status: "finished",
  },
  {
    id: "#845",
    taskTitle: "Engineering Lite Touch",
    assignedTo: "Louis Nagle",
    dueDate: "10 Apr 2024",
    priority: "Low",
    status: "cancelled",
  },
  {
    id: "#851",
    taskTitle: "Mobile Application",
    assignedTo: "Ava Cooper",
    dueDate: "15 Apr 2024",
    priority: "High",
    status: "finished",
  },
  {
    id: "#850",
    taskTitle: "System Deployment",
    assignedTo: "Isabella Evans",
    dueDate: "10 Apr 2024",
    priority: "Low",
    status: "cancelled",
  },
  {
    id: "#849",
    taskTitle: "Hotel Management System",
    assignedTo: "Shawn Kennedy",
    dueDate: "30 Apr 2024",
    priority: "High",
    status: "finished",
  },
  {
    id: "#848",
    taskTitle: "Send Proposal to APR Ltd",
    assignedTo: "Roberto Cruz",
    dueDate: "25 Apr 2024",
    priority: "Low",
    status: "pending",
  },
  {
    id: "#847",
    taskTitle: "Python Upgrade",
    assignedTo: "Juli Johnson",
    dueDate: "20 Apr 2024",
    priority: "Medium",
    status: "inProgress",
  },
  {
    id: "#846",
    taskTitle: "Schedule meeting with Trezo",
    assignedTo: "Catalina Engles",
    dueDate: "15 Apr 2024",
    priority: "High",
    status: "finished",
  },
];

const ITEMS_PER_PAGE = 10; // Number of items per page

const ToDoList = () => {
  const [filteredData, setFilteredData] = useState(toDoListData);
  const [searchTerm, setSearchTerm] = useState("");
  const [selectAll, setSelectAll] = useState(false);
  const [selectedRows, setSelectedRows] = useState({});
  const [currentPage, setCurrentPage] = useState(1);

  const totalPages = Math.ceil(filteredData.length / ITEMS_PER_PAGE);

  // Handle search
  const handleSearch = (e) => {
    const value = e.target.value.toLowerCase();
    setSearchTerm(value);
    setFilteredData(
      toDoListData.filter(
        (task) =>
          task.taskTitle.toLowerCase().includes(value) ||
          task.assignedTo.toLowerCase().includes(value) ||
          task.id.toLowerCase().includes(value)
      )
    );
    setCurrentPage(1); // Reset to the first page after search
  };

  // Handle "Select All" checkbox
  const handleSelectAll = () => {
    const newSelectAllState = !selectAll;
    setSelectAll(newSelectAllState);
    const updatedSelectedRows = {};
    visibleData().forEach((task) => {
      updatedSelectedRows[task.id] = newSelectAllState;
    });
    setSelectedRows(updatedSelectedRows);
  };

  // Handle individual checkbox
  const handleCheckboxChange = (id) => {
    setSelectedRows((prev) => ({
      ...prev,
      [id]: !prev[id],
    }));
  };

  // Handle page change
  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
    setSelectAll(false); // Reset "Select All" on page change
  };

  // Get the visible data for the current page
  const visibleData = () => {
    const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
    return filteredData.slice(startIndex, startIndex + ITEMS_PER_PAGE);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 p-4">
            <Form className="position-relative table-src-form me-0">
              <Form.Control
                type="text"
                placeholder="Search here"
                value={searchTerm}
                onChange={handleSearch}
              />
              <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>
            <AddNewTask />
          </div>

          <div className="default-table-area style-two default-table-width">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th>
                      <Form.Check
                        type="checkbox"
                        checked={selectAll}
                        onChange={handleSelectAll}
                        label="ID"
                      />
                    </th>
                    <th>Task Title</th>
                    <th>Assigned To</th>
                    <th>Due Date</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  {visibleData().map((task) => (
                    <tr key={task.id}>
                      <td className="text-body">
                        <Form.Check
                          type="checkbox"
                          checked={selectedRows[task.id] || false}
                          onChange={() => handleCheckboxChange(task.id)}
                          label={task.id}
                        />
                      </td>
                      <td className="text-body">{task.taskTitle}</td>
                      <td>{task.assignedTo}</td>
                      <td className="text-body">{task.dueDate}</td>
                      <td className="text-body">{task.priority}</td>
                      <td>
                        <span
                          className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${task.status}`}
                        >
                          {task.status}
                        </span>
                      </td>
                      <td>
                        <div className="d-flex align-items-center gap-1">
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative">
                            <span className="material-symbols-outlined fs-16 text-primary">
                              visibility
                            </span>
                          </button>
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative">
                            <span className="material-symbols-outlined fs-16 text-body">
                              edit
                            </span>
                          </button>
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative">
                            <span className="material-symbols-outlined fs-16 text-danger">
                              delete
                            </span>
                          </button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="p-4">
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">
                  Showing {visibleData().length} of {filteredData.length}{" "}
                  Results
                </span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li
                      className={`page-item ${
                        currentPage === 1 ? "disabled" : ""
                      }`}
                    >
                      <Button
                        className="page-link icon"
                        onClick={() => handlePageChange(currentPage - 1)}
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </Button>
                    </li>
                    {Array.from({ length: totalPages }, (_, i) => (
                      <li key={i} className="page-item">
                        <Button
                          className={`page-link ${
                            currentPage === i + 1 ? "active" : ""
                          }`}
                          onClick={() => handlePageChange(i + 1)}
                        >
                          {i + 1}
                        </Button>
                      </li>
                    ))}
                    <li
                      className={`page-item ${
                        currentPage === totalPages ? "disabled" : ""
                      }`}
                    >
                      <Button
                        className="page-link icon"
                        onClick={() => handlePageChange(currentPage + 1)}
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_right
                        </span>
                      </Button>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ToDoList;
