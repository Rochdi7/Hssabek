"use client";

import { useState } from "react";
import { Dropdown, Card, Table, ProgressBar, Button } from "react-bootstrap";

const studentsProgressData = [
  {
    name: "Olivia Clark",
    courseName: "Web Design",
    status: "55",
    progressBg: "warning",
  },
  {
    name: "Alexander Garcia",
    courseName: "Python Dev",
    status: "80",
    progressBg: "success",
  },
  {
    name: "Chloe Lewis",
    courseName: "Front-end",
    status: "25",
    progressBg: "info",
  },
  {
    name: "Ava Turner",
    courseName: "Back-end",
    status: "50",
    progressBg: "danger",
  },
  {
    name: "Ryan Flores",
    courseName: "Data Analytics",
    status: "100",
    progressBg: "success",
  },
  {
    name: "John Doe",
    courseName: "Plugin Dev",
    status: "10",
    progressBg: "warning",
  },
  {
    name: "Smith Clark",
    courseName: "Web Design",
    status: "40",
    progressBg: "warning",
  },
  {
    name: "Williams Garcia",
    courseName: "Python Dev",
    status: "75",
    progressBg: "success",
  },
  {
    name: "Brown Lewis",
    courseName: "Front-end",
    status: "45",
    progressBg: "info",
  },
  {
    name: "Taylor Turner",
    courseName: "Back-end",
    status: "30",
    progressBg: "danger",
  },
  {
    name: "Wilson Flores",
    courseName: "Data Analytics",
    status: "100",
    progressBg: "success",
  },
  {
    name: "O'Connor Doe",
    courseName: "Plugin Dev",
    status: "15",
    progressBg: "warning",
  }, 

];

const StudentsProgress = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 6;

  const totalItems = studentsProgressData.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const currentData = studentsProgressData.slice(startIndex, endIndex);

  const handleNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const handlePrevPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-0">
        <div className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0">Student&apos;s Progress</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>
              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">Today</Dropdown.Item>
                <Dropdown.Item href="#">Last 7 Days</Dropdown.Item>
                <Dropdown.Item href="#">Last Month</Dropdown.Item>
                <Dropdown.Item href="#">Last 1 Year</Dropdown.Item>
                <Dropdown.Item href="#">All Time</Dropdown.Item>
                <Dropdown.Item href="#">View</Dropdown.Item>
                <Dropdown.Item href="#">Delete</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>
        </div>

        <div className="default-table-area style-two top-instructors">
          <div className="table-responsive">
            <Table className="table align-middle border-0">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                {currentData.map((student, index) => (
                  <tr key={index}>
                    <td>
                      <h6 className="mb-0 fs-14 fw-medium">{student.name}</h6>
                    </td>
                    <td className="text-body">{student.courseName}</td>
                    <td>
                      <ProgressBar
                        variant={student.progressBg}
                        now={student.status}
                        style={{ height: "5px" }}
                      />
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>

        <div className="p-4 d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2">
          <span className="fs-12 fw-medium">
            Items per page: {itemsPerPage}
          </span>
          <div className="d-flex align-items-center">
            <span className="fs-12 fw-medium me-2">
              {startIndex + 1} - {Math.min(endIndex, totalItems)} of{" "}
              {totalItems}
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0">
                <li className="page-item">
                  <Button
                    onClick={handlePrevPage}
                    disabled={currentPage === 1}
                    className="page-link icon"
                  >
                    <span className="material-symbols-outlined">
                      keyboard_arrow_left
                    </span>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    onClick={handleNextPage}
                    disabled={currentPage === totalPages}
                    className="page-link icon"
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
      </Card.Body>
    </Card>
  );
};

export default StudentsProgress;
