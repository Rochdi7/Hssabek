"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Image from "next/image";

const recentLeadsData = [
  {
    customerImg: "/images/user-11.jpg",
    customerName: "David Brown",
    email: "david@trezo.com",
    source: "Organic",
    status: "confirmed",
  },
  {
    customerImg: "/images/user-12.jpg",
    customerName: "Sarah Miller",
    email: "sara@trezo.com",
    source: "Social",
    status: "pending",
  },
  {
    customerImg: "/images/user-13.jpg",
    customerName: "Michael Wilson",
    email: "micheal@trezo.com",
    source: "Website",
    status: "inProgress",
  },
  {
    customerImg: "/images/user-15.jpg",
    customerName: "Amanda Clark",
    email: "amanda@trezo.com",
    source: "Paid",
    status: "confirmed",
  },
  {
    customerImg: "/images/user-16.jpg",
    customerName: "Jennifer Taylor",
    email: "taylor@trezo.com",
    source: "Others",
    status: "rejected",
  },
  {
    customerImg: "/images/user-12.jpg",
    customerName: "Sarah Miller",
    email: "sara@trezo.com",
    source: "Social",
    status: "pending",
  },
  {
    customerImg: "/images/user-17.jpg",
    customerName: "Sarah Miller",
    email: "sara@trezo.com",
    source: "Social",
    status: "pending",
  },
  {
    customerImg: "/images/user-11.jpg",
    customerName: "David Brown",
    email: "david@trezo.com",
    source: "Organic",
    status: "confirmed",
  },
  {
    customerImg: "/images/user-18.jpg",
    customerName: "Jennifer Taylor",
    email: "taylor@trezo.com",
    source: "Others",
    status: "rejected",
  }, 
  {
    customerImg: "/images/user-13.jpg",
    customerName: "Michael Wilson",
    email: "micheal@trezo.com",
    source: "Website",
    status: "inProgress",
  },
];

const RecentLeads = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [selectedItems, setSelectedItems] = useState([]);
  const [isSelectAll, setIsSelectAll] = useState(false);

  const pageSize = 5;
  const totalPages = Math.ceil(recentLeadsData.length / pageSize);
  const startIdx = (currentPage - 1) * pageSize;
  const currentItems = recentLeadsData.slice(startIdx, startIdx + pageSize);

  const handlePrevPage = () => setCurrentPage((prev) => Math.max(prev - 1, 1));
  const handleNextPage = () =>
    setCurrentPage((prev) => Math.min(prev + 1, totalPages));

  const handleSelectAll = (event) => {
    setIsSelectAll(event.target.checked);
    if (event.target.checked) {
      setSelectedItems(currentItems.map((item) => item.email));
    } else {
      setSelectedItems([]);
    }
  };

  const handleSelectItem = (email) => {
    if (selectedItems.includes(email)) {
      setSelectedItems(selectedItems.filter((item) => item !== email));
    } else {
      setSelectedItems([...selectedItems, email]);
    }
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-0">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
          <h3 className="mb-0">Recent Leads</h3>

          <Form.Select
            className="month-select form-control p-0 h-auto border-0"
            aria-label="Default select example"
          >
            <option defaultValue="0">Select</option>
            <option defaultValue="1">Today</option>
            <option defaultValue="2">Last Weekly</option>
            <option defaultValue="3">Last Monthly</option>
            <option defaultValue="4">Last Yearly</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two recent-leads">
          <div className="table-responsive">
            <Table className="align-middle">
              <thead>
                <tr>
                  <th scope="col">
                    <Form.Check
                      type="checkbox"
                      checked={isSelectAll}
                      onChange={handleSelectAll}
                      label=''
                    />
                  </th>
                  <th scope="col">Customer</th>
                  <th scope="col">Email</th>
                  <th scope="col">Source</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                {currentItems.map((item, i) => (
                  <tr key={i}>
                    <td>
                      <Form.Check
                        type="checkbox"
                        checked={selectedItems.includes(item.email)}
                        onChange={() => handleSelectItem(item.email)}
                        label=''
                      />
                    </td>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src={item.customerImg}
                          className="wh-44 rounded-circle"
                          alt="user"
                          width={44}
                          height={44}
                        />
                        <div className="ms-2">
                          <h6 className="fw-medium fs-14 mb-0">
                            {item.customerName}
                          </h6>
                        </div>
                      </div>
                    </td>
                    <td>{item.email}</td>
                    <td>{item.source}</td>
                    <td>
                      <span
                        className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${item.status}`}
                      >
                        {item.status}
                      </span>
                    </td>
                    <td>
                      <div className="d-flex align-items-center gap-1">
                        <Button
                          className="ps-0 border-0 bg-transparent lh-1"
                          variant="link"
                        >
                          <span className="material-symbols-outlined fs-16 text-primary">
                            visibility
                          </span>
                        </Button>
                        <Button
                          className="ps-0 border-0 bg-transparent lh-1"
                          variant="link"
                        >
                          <span className="material-symbols-outlined fs-16 text-body">
                            edit
                          </span>
                        </Button>
                        <Button
                          className="ps-0 border-0 bg-transparent lh-1"
                          variant="link"
                        >
                          <span className="material-symbols-outlined fs-16 text-danger">
                            delete
                          </span>
                        </Button>
                      </div>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
            <span className="fs-12 fw-medium">
              Showing {startIdx + 1} -{" "}
              {Math.min(startIdx + pageSize, recentLeadsData.length)} of{" "}
              {recentLeadsData.length} Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handlePrevPage}
                    disabled={currentPage === 1}
                  >
                    <span className="material-symbols-outlined">
	keyboard_arrow_left
</span>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handleNextPage}
                    disabled={currentPage === totalPages}
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

export default RecentLeads;
