"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Link from "next/link";

const TopBrowsingPagesToday = () => {
  const data = [
    {
      url: "/dashboard-overview",
      source: "Organic",
      time: "3m 45s",
      views: 350,
      bounceRate: "30.5%",
    },
    {
      url: "/custom-reports/generate",
      source: "Paid",
      time: "7m 00s",
      views: 400,
      bounceRate: "24.9%",
    },
    {
      url: "/export-data",
      source: "Direct",
      time: "2m 30s",
      views: 125,
      bounceRate: "50.0%",
    },
    {
      url: "/realtime-users",
      source: "Referral",
      time: "3m 00s",
      views: 190,
      bounceRate: "40.2%",
    },
    {
      url: "/account-preferences",
      source: "Organic",
      time: "2m 50s",
      views: 180,
      bounceRate: "42.1%",
    },
    {
      url: "/apis-and-reports",
      source: "Paid",
      time: "4m 15s",
      views: 320,
      bounceRate: "28.7%",
    },
    {
      url: "/apis-and-reports",
      source: "Paid",
      time: "4m 15s",
      views: 320,
      bounceRate: "28.7%",
    },
    {
      url: "/dashboard-overview",
      source: "Organic",
      time: "3m 45s",
      views: 350,
      bounceRate: "30.5%",
    },

    {
      url: "/export-data",
      source: "Direct",
      time: "2m 30s",
      views: 125,
      bounceRate: "50.0%",
    },
    {
      url: "/realtime-users",
      source: "Referral",
      time: "3m 00s",
      views: 190,
      bounceRate: "40.2%",
    },
    {
      url: "/account-preferences",
      source: "Organic",
      time: "2m 50s",
      views: 180,
      bounceRate: "42.1%",
    },
    {
      url: "/custom-reports/generate",
      source: "Paid",
      time: "7m 00s",
      views: 400,
      bounceRate: "24.9%",
    },
  ];

  const [currentPage, setCurrentPage] = useState(1);
  const [itemsPerPage] = useState(6);
  const [searchQuery, setSearchQuery] = useState("");

  // Filter data based on search query
  const filteredData = data.filter(
    (item) =>
      item.url.toLowerCase().includes(searchQuery.toLowerCase()) ||
      item.source.toLowerCase().includes(searchQuery.toLowerCase())
  );

  // Calculate pagination values
  const totalPages = Math.ceil(filteredData.length / itemsPerPage);
  const currentData = filteredData.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  // Handle page change
  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  // Handle search query change
  const handleSearchChange = (event) => {
    setSearchQuery(event.target.value);
    setCurrentPage(1); // Reset to the first page on new search
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-3 mb-1">
          <h3 className="mb-0">Top Browsing Pages Today</h3>

          <Form className="position-relative table-src-form me-0">
            <Form.Control
              type="text"
              placeholder="Search here"
              value={searchQuery}
              onChange={handleSearchChange}
            />
            <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
              search
            </span>
          </Form>
        </div>

        <div className="default-table-area style-two browser-leads">
          <div className="table-responsive">
            <Table
              className="table align-middle border-0 analytics-tbpt-table"
            >
              <thead>
                <tr className="border-bottom">
                  <th scope="col" className="bg-transparent">
                    Page URL
                  </th>
                  <th scope="col" className="bg-transparent">
                    Source
                  </th>
                  <th scope="col" className="bg-transparent">
                    Avg Time
                  </th>
                  <th scope="col" className="bg-transparent text-end">
                    Page Views
                  </th>
                  <th scope="col" className="bg-transparent text-end">
                    Bounce Rate (%)
                  </th>
                </tr>
              </thead>
              <tbody>
                {currentData.length > 0 ? (
                  currentData.map((item, index) => (
                    <tr key={index}>
                      <td className="fw-medium">
                        <Link href="#" className="text-primary">
                          {item.url}
                        </Link>
                      </td>
                      <td className="fw-medium">{item.source}</td>
                      <td className="fw-medium">{item.time}</td>
                      <td className="text-end fw-medium">{item.views}</td>
                      <td className="text-end fw-medium">{item.bounceRate}</td>
                    </tr>
                  ))
                ) : (
                  <tr>
                    <td colSpan="5" className="text-center">
                      No results found
                    </td>
                  </tr>
                )}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
            <span className="fs-12 fw-medium">
              Showing {itemsPerPage * (currentPage - 1) + 1} to{" "}
              {Math.min(itemsPerPage * currentPage, data.length)} of{" "}
              {data.length} Results
            </span>
            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={() => handlePageChange(currentPage - 1)}
                    aria-label="Previous"
                    disabled={currentPage === 1}
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
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={() => handlePageChange(currentPage + 1)}
                    aria-label="Next"
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

export default TopBrowsingPagesToday;
