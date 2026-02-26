"use client";

import React, { useState } from "react";
import { Card, Form, Button } from "react-bootstrap";

const ClicksByKeywords = () => {
  const data = [
    {
      id: 1,
      dimension: "data metrics",
      impressions: 949,
      clicks: 656,
    },
    {
      id: 2,
      dimension: "sales metrics",
      impressions: 842,
      clicks: 420,
    },
    {
      id: 3,
      dimension: "analytics dashboard",
      impressions: 640,
      clicks: 534,
    },
    {
      id: 4,
      dimension: "saas metrics",
      impressions: 865,
      clicks: 560,
    },
    {
      id: 5,
      dimension: "hubspot analytics",
      impressions: 435,
      clicks: 328,
    },
    {
      id: 6,
      dimension: "smart goals",
      impressions: 756,
      clicks: 235,
    },
    {
      id: 7,
      dimension: "google analytics",
      impressions: 578,
      clicks: 456,
    },
    {
      id: 8,
      dimension: "trezo dashboard",
      impressions: 660,
      clicks: 478,
    },
    {
      id: 9,
      dimension: "metric insights",
      impressions: 500,
      clicks: 450,
    },
    {
      id: 10,
      dimension: "analytics overview",
      impressions: 610,
      clicks: 300,
    },
    {
      id: 11,
      dimension: "data metrics",
      impressions: 949,
      clicks: 656,
    },
    {
      id: 12,
      dimension: "sales metrics",
      impressions: 842,
      clicks: 420,
    },
    {
      id: 13,
      dimension: "analytics dashboard",
      impressions: 640,
      clicks: 534,
    },
    {
      id: 14,
      dimension: "saas metrics",
      impressions: 865,
      clicks: 560,
    },
    {
      id: 15,
      dimension: "hubspot analytics",
      impressions: 435,
      clicks: 328,
    },
    {
      id: 16,
      dimension: "smart goals",
      impressions: 756,
      clicks: 235,
    },
  ];

  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 8;
  const totalPages = Math.ceil(data.length / itemsPerPage);

  const handlePageChange = (page) => {
    if (page > 0 && page <= totalPages) {
      setCurrentPage(page);
    }
  };

  const displayedData = data.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
          <h3 className="mb-0">Clicks/Impressions by Keywords</h3>
          <Form.Select className="form-select month-select form-control p-0 h-auto border-0 pe-4 w-auto">
            <option defaultValue="0">July 01 - July 31, 2024</option>
            <option defaultValue="1">August 01 - August 31, 2024</option>
            <option defaultValue="2">September 01 - September 30, 2024</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two browser-leads">
          <div className="table-responsive">
            <table className="table align-middle border-0 for-mobile-width">
              <thead>
                <tr className="border-bottom">
                  <th scope="col" className="text-center bg-transparent">
                    <div className="d-flex">
                      <span>#</span>
                      <span className="ps-4">Dimension</span>
                    </div>
                  </th>
                  <th scope="col" className="text-end bg-transparent">
                    Impressions
                  </th>
                  <th scope="col" className="text-end bg-transparent">
                    Clicks
                  </th>
                </tr>
              </thead>
              <tbody>
                {displayedData.map((item, index) => (
                  <tr key={item.id}>
                    <td className="text-end fw-medium">
                      <div className="d-flex">
                        <span className="fw-medium">{item.id}</span>
                        <span className="ps-4 fw-medium">{item.dimension}</span>
                      </div>
                    </td>
                    <td className="text-end fw-medium">
                      <div className="d-flex align-items-center justify-content-end">
                        <span
                          className={`material-symbols-outlined fs-20 ${
                            item.impressions > 500
                              ? "text-success"
                              : "text-danger"
                          } position-relative top-2 me-2`}
                        >
                          {item.impressions > 500
                            ? "trending_up"
                            : "trending_down"}
                        </span>

                        <span className="fw-medium">{item.impressions}</span>
                      </div>
                    </td>
                    <td className="text-end fw-medium">
                      <div className="d-flex align-items-center justify-content-end">
                        <span
                          className={`material-symbols-outlined fs-20 ${
                            item.clicks > 400 ? "text-success" : "text-danger"
                          } position-relative top-2 me-2`}
                        >
                          {item.clicks > 400 ? "trending_up" : "trending_down"}
                        </span>

                        <span className="fw-medium">{item.clicks}</span>
                      </div>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
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

export default ClicksByKeywords;
