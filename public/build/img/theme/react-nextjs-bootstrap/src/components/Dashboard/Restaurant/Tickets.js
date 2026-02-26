"use client";

import React, { useEffect, useState } from "react";
import { Card, Table, Dropdown } from "react-bootstrap";

const Tickets = () => {
  const [tickets, setTickets] = useState([]);

  useEffect(() => {
    // Simulate API call
    const mockTickets = [
      {
        id: 1,
        ticketId: "#3242",
        title: "Order delayed for 5 mins",
        updatedOn: "10 Nov, 2025",
        status: "Solved",
        statusColor: "#25b003",
        statusBgColor: "#D8FFC8",
      },
      {
        id: 2,
        ticketId: "#3243",
        title: "Provide rotten Burger",
        updatedOn: "10 Nov, 2025",
        status: "Pending",
        statusColor: "#7C24CC",
        statusBgColor: "#F3E8FF",
      },
      {
        id: 3,
        ticketId: "#3244",
        title: "Too much salt in pizza",
        updatedOn: "10 Nov, 2025",
        status: "Solved",
        statusColor: "#25b003",
        statusBgColor: "#D8FFC8",
      },
      {
        id: 4,
        ticketId: "#3245",
        title: "Order delayed for 5 mins",
        updatedOn: "10 Nov, 2025",
        status: "Solved",
        statusColor: "#25b003",
        statusBgColor: "#D8FFC8",
      },
      {
        id: 5,
        ticketId: "#3246",
        title: "Delivery man misbehaved",
        updatedOn: "10 Nov, 2025",
        status: "Pending",
        statusColor: "#7C24CC",
        statusBgColor: "#F3E8FF",
      },
      {
        id: 6,
        ticketId: "#3247",
        title: "App doesn’t work",
        updatedOn: "10 Nov, 2025",
        status: "Solved",
        statusColor: "#25b003",
        statusBgColor: "#D8FFC8",
      },
    ];

    setTickets(mockTickets);
  }, []);

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-20">
          <h3 className="mb-0 text-text-secondary-50">Tickets</h3>

          <Dropdown className="action-opt">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="bg-transparent p-0"
            >
              <i className="ri-more-2-fill fs-20"></i>
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Day
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Week
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Month
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                This Year
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="default-table-area style-two campaigns-table tickets-table">
          <div className="table-responsive">
            <Table className="border-0">
              <tbody>
                {tickets.map((ticket) => (
                  <tr key={ticket.id}>
                    <td
                      className="fs-12 fw-medium text-body-color-50 border-border-color-50"
                      style={{ paddingTop: "15.5px", paddingBottom: "15.5px" }}
                    >
                      {ticket.ticketId}
                    </td>
                    <td
                      className="border-border-color-50 ps-4"
                      style={{ paddingTop: "15.5px", paddingBottom: "15.5px" }}
                    >
                      <h4 className="mb-0 fs-14 fw-semibold text-body-color-50 mb-1">
                        {ticket.title}
                      </h4>
                      <span className="fs-12 fw-medium text-body">
                        Updated on: {ticket.updatedOn}
                      </span>
                    </td>
                    <td
                      className="border-border-color-50 text-right"
                      style={{ paddingTop: "15.5px", paddingBottom: "15.5px" }}
                    >
                      <span
                        className="d-inline-block rounded-pill fs-12 fw-medium"
                        style={{
                          backgroundColor: ticket.statusBgColor,
                          color: ticket.statusColor,
                          padding: "4px 10px",
                          lineHeight: 1,
                        }}
                      >
                        {ticket.status}
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>
      </Card.Body>
    </Card>
  );
};

export default Tickets;
