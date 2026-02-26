"use client";

import { Card, Table, Button, Form, Dropdown } from "react-bootstrap";
import Image from "next/image";
import { useState } from "react";

// Sample data for recent calls
const recentCallsData = [
  {
    name: "Emily Johnson",
    phone: "+1 555-123-4567",
    callType: "Inbound",
    duration: "5 mins",
    status: "Resolved",
    time: "10:30 AM",
    csat: "90%",
    image: "/images/user-111.jpg",
  },
  {
    name: "Sarah Green",
    phone: "+44 20 7946 0958",
    callType: "Outbound",
    duration: "3 mins",
    status: "Pending",
    time: "10:35 AM",
    csat: "85%",
    image: "/images/user-112.jpg",
  },
  {
    name: "Adam Smith",
    phone: "+1 555-234-5678",
    callType: "Inbound",
    duration: "7 mins",
    status: "Resolved",
    time: "10:40 AM",
    csat: "83%",
    image: "/images/user-113.jpg",
  },
  {
    name: "Laura Martin",
    phone: "+61 2 1234 5678",
    callType: "Inbound",
    duration: "4 mins",
    status: "Dropped",
    time: "10:45 AM",
    csat: "87%",
    image: "/images/user-114.jpg",
  },
  {
    name: "Megan Mia",
    phone: "+555-234-5679",
    callType: "Outbound",
    duration: "2 mins",
    status: "Pending",
    time: "9:45 AM",
    csat: "60%",
    image: "/images/user-87.png",
  },
  {
    name: "Jessica Smith",
    phone: "+1 555-234-5680",
    callType: "Inbound",
    duration: "5 mins",
    status: "Resolved",
    time: "11:40 AM",
    csat: "85%",
    image: "/images/user-88.png",
  },
  {
    name: "Michelle Tracy",
    phone: "+1 555-123-5681",
    callType: "Inbound",
    duration: "10 mins",
    status: "Resolved",
    time: "9:30 AM",
    csat: "90%",
    image: "/images/user-89.png",
  },
  {
    name: "Smith Green",
    phone: "+1 555-123-5682",
    callType: "Outbound",
    duration: "4 mins",
    status: "Pending",
    time: "8:35 AM",
    csat: "85%",
    image: "/images/user-90.png",
  },
];

const RecentCalls = () => {
  const [sortConfig, setSortConfig] = useState({ key: null, direction: "asc" });
  const [currentPage, setCurrentPage] = useState(1);
  const [searchQuery, setSearchQuery] = useState(""); // New state for search query
  const itemsPerPage = 4; // Adjust based on how many items you want per page

  // Filter data based on the search query
  const filteredData = recentCallsData.filter(
    (call) =>
      call.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
      call.phone.includes(searchQuery)
  );

  // Sort data based on the column and direction
  const sortedData = [...filteredData].sort((a, b) => {
    if (sortConfig.key === null) return 0;
    const aValue = a[sortConfig.key];
    const bValue = b[sortConfig.key];

    if (aValue < bValue) return sortConfig.direction === "asc" ? -1 : 1;
    if (aValue > bValue) return sortConfig.direction === "asc" ? 1 : -1;
    return 0;
  });

  // Handle column header click to change sorting
  const handleSort = (key) => {
    let direction = "asc";
    if (sortConfig.key === key && sortConfig.direction === "asc") {
      direction = "desc"; // Toggle the direction if the same column is clicked
    }
    setSortConfig({ key, direction });
  };

  // Pagination logic
  const totalPages = Math.ceil(sortedData.length / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const currentCalls = sortedData.slice(startIndex, startIndex + itemsPerPage);

  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  return (
    <Card className="rounded-3 bg-white border-0 mb-4">
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 border-bottom pb-4 custom-padding-30">
        <h3 className="mb-0">Recent Calls</h3>

        <div className="d-flex align-items-center">
          <Form className="position-relative table-src-form">
            <Form.Control
              type="text"
              className="border-0"
              style={{ width: "265px" }}
              placeholder="Search for a name..."
              value={searchQuery} // Bind the search input to the state
              onChange={(e) => setSearchQuery(e.target.value)} // Update state on input change
            />
            <i className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
              search
            </i>
          </Form>

          <Dropdown className="action-opt ms-e-10">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="bg-transparent p-0 lh-1"
            >
              <i className="material-symbols-outlined">more_vert</i>
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#">This Day</Dropdown.Item>
              <Dropdown.Item href="#">This Week</Dropdown.Item>
              <Dropdown.Item href="#">This Month</Dropdown.Item>
              <Dropdown.Item href="#">This Year</Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      </div>

      <div className="default-table-area style-three recent-calls">
        <div className="table-responsive">
          <Table className="align-middle border-0">
            <thead className="border-bottom">
              <tr>
                <th scope="col" className="bg-transparent">
                  <button
                    type="button"
                    className="btn p-0 border-none"
                    onClick={() => handleSort("name")}
                  >
                    Caller Name{" "}
                    <i
                      className={`ri-expand-${
                        sortConfig.key === "name"
                          ? sortConfig.direction
                          : "up-down"
                      }-fill`}
                    ></i>
                  </button>
                </th>
                <th scope="col" className="bg-transparent">
                  <button
                    type="button"
                    className="btn p-0 border-none"
                    onClick={() => handleSort("callType")}
                  >
                    Call Type{" "}
                    <i
                      className={`ri-expand-${
                        sortConfig.key === "callType"
                          ? sortConfig.direction
                          : "up-down"
                      }-fill`}
                    ></i>
                  </button>
                </th>
                <th scope="col" className="bg-transparent">
                  <button
                    type="button"
                    className="btn p-0 border-none"
                    onClick={() => handleSort("duration")}
                  >
                    Duration{" "}
                    <i
                      className={`ri-expand-${
                        sortConfig.key === "duration"
                          ? sortConfig.direction
                          : "up-down"
                      }-fill`}
                    ></i>
                  </button>
                </th>
                <th scope="col" className="bg-transparent text-end">
                  <button
                    type="button"
                    className="btn p-0 border-none"
                    onClick={() => handleSort("status")}
                  >
                    Status{" "}
                    <i
                      className={`ri-expand-${
                        sortConfig.key === "status"
                          ? sortConfig.direction
                          : "up-down"
                      }-fill`}
                    ></i>
                  </button>
                </th>
                <th scope="col" className="bg-transparent text-end">
                  <button
                    type="button"
                    className="btn p-0 border-none"
                    onClick={() => handleSort("time")}
                  >
                    Time{" "}
                    <i
                      className={`ri-expand-${
                        sortConfig.key === "time"
                          ? sortConfig.direction
                          : "up-down"
                      }-fill`}
                    ></i>
                  </button>
                </th>
                <th scope="col" className="bg-transparent text-end">
                  <button
                    type="button"
                    className="btn p-0 border-none"
                    onClick={() => handleSort("csat")}
                  >
                    CSAT{" "}
                    <i
                      className={`ri-expand-${
                        sortConfig.key === "csat"
                          ? sortConfig.direction
                          : "up-down"
                      }-fill`}
                    ></i>
                  </button>
                </th>
              </tr>
            </thead>
            <tbody>
              {currentCalls.map((call, index) => (
                <tr key={index}>
                  <td>
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0">
                        <Image
                          src={call.image}
                          className="rounded-circle"
                          alt="user"
                          width={40}
                          height={40}
                        />
                      </div>
                      <div className="flex-grow-1 ms-2">
                        <h4 className="fs-14 fw-medium mb-0">{call.name}</h4>
                        <span className="fs-12 text-body">{call.phone}</span>
                      </div>
                    </div>
                  </td>
                  <td
                    className={`text-${
                      call.callType === "Inbound" ? "primary" : "danger"
                    } fw-medium`}
                  >
                    {call.callType}
                  </td>
                  <td className="fw-medium">{call.duration}</td>
                  <td
                    className={`text-${
                      call.status === "Resolved"
                        ? "success-60"
                        : call.status === "Pending"
                        ? "danger"
                        : "primary-div"
                    } fw-medium text-end`}
                  >
                    {call.status}
                  </td>
                  <td className="fw-medium text-end">{call.time}</td>
                  <td
                    className={`text-${
                      call.csat === "90%" ? "success-60" : "primary-div"
                    } fw-medium text-end`}
                  >
                    {call.csat}
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        </div>

        <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 custom-padding-30 py-3">
          <span className="fs-12 fw-medium">
            Showing {currentCalls.length} of {sortedData.length} Results
          </span>

          <nav aria-label="Page navigation example">
            <ul className="pagination mb-0 justify-content-center">
              <li className="page-item">
                <Button
                  className="page-link icon"
                  onClick={() =>
                    setCurrentPage((prev) => Math.max(prev - 1, 1))
                  }
                >
                  <i className="material-symbols-outlined">
                    keyboard_arrow_left
                  </i>
                </Button>
              </li>
              {Array.from({ length: totalPages }, (_, index) => (
                <li className="page-item" key={index}>
                  <Button
                    className={`page-link ${
                      currentPage === index + 1 ? "active" : ""
                    }`}
                    onClick={() => handlePageChange(index + 1)}
                  >
                    {index + 1}
                  </Button>
                </li>
              ))}
              <li className="page-item">
                <Button
                  className="page-link icon"
                  onClick={() =>
                    setCurrentPage((prev) => Math.min(prev + 1, totalPages))
                  }
                >
                  <i className="material-symbols-outlined">
                    keyboard_arrow_right
                  </i>
                </Button>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </Card>
  );
};

export default RecentCalls;
