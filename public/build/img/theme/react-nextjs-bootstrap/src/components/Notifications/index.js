"use client";

import { useState } from "react";
import { Card, Table } from "react-bootstrap";

const initialNotificationsData = [
  {
    id: "#JAN-854",
    timestamp: "01 Dec 2024 09:30 AM",
    type: "Information",
    content: "New software update available. Click here to download.",
    status: "unread",
  },
  {
    id: "#JAN-853",
    timestamp: "30 Nov 2024 09:30 AM",
    type: "Alert",
    content: "Urgent: Server maintenance scheduled for tomorrow at 10:00 PM.",
    status: "unread",
  },
  {
    id: "#JAN-852",
    timestamp: "28 Nov 2024 09:30 AM",
    type: "Announcement",
    content: "Welcome to our new team member, Jane Smith, as Head of Sales.",
    status: "read",
  },
  {
    id: "#JAN-851",
    timestamp: "27 Nov 2024 09:30 AM",
    type: "Information",
    content: "Check out our latest blog post for tips on improving efficiency.",
    status: "read",
  },
  {
    id: "#JAN-850",
    timestamp: "26 Nov 2024 09:30 AM",
    type: "Alert",
    content: "Attention: Upcoming webinar on cybersecurity best practices.",
    status: "unread",
  },
  {
    id: "#JAN-849",
    timestamp: "25 Nov 2024 09:30 AM",
    type: "Announcement",
    content: "Happy Thanksgiving! Our office will be closed on Nov 30.",
    status: "read",
  },
  {
    id: "#JAN-848",
    timestamp: "24 Nov 2024 09:30 AM",
    type: "Information",
    content: "Year-end financial reports are now available for download.",
    status: "read",
  },
  {
    id: "#JAN-847",
    timestamp: "23 Nov 2024 09:30 AM",
    type: "Announcement",
    content: "Critical security update. Update your passwords immediately.",
    status: "read",
  },
  {
    id: "#JAN-846",
    timestamp: "22 Nov 2024 09:30 AM",
    type: "Information",
    content: "Holiday Office Party on Dec 20. Save the date!",
    status: "read",
  },
  {
    id: "#JAN-845",
    timestamp: "20 Nov 2024 09:30 AM",
    type: "Alert",
    content: "Year-end sale: Up to 20% off on selected products.",
    status: "read",
  },
  {
    id: "#JAN-851",
    timestamp: "27 Nov 2024 09:30 AM",
    type: "Information",
    content: "Check out our latest blog post for tips on improving efficiency.",
    status: "read",
  },
  {
    id: "#JAN-850",
    timestamp: "26 Nov 2024 09:30 AM",
    type: "Alert",
    content: "Attention: Upcoming webinar on cybersecurity best practices.",
    status: "unread",
  },
  {
    id: "#JAN-849",
    timestamp: "25 Nov 2024 09:30 AM",
    type: "Announcement",
    content: "Happy Thanksgiving! Our office will be closed on Nov 30.",
    status: "read",
  },
  {
    id: "#JAN-848",
    timestamp: "24 Nov 2024 09:30 AM",
    type: "Information",
    content: "Year-end financial reports are now available for download.",
    status: "read",
  },
  {
    id: "#JAN-847",
    timestamp: "23 Nov 2024 09:30 AM",
    type: "Announcement",
    content: "Critical security update. Update your passwords immediately.",
    status: "read",
  },
];

const Notifications = () => {
  const [notifications, setNotifications] = useState(initialNotificationsData);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 10;

  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentNotifications = notifications.slice(indexOfFirstItem, indexOfLastItem);

  const handleMarkAsRead = (id) => {
    setNotifications((prevNotifications) =>
      prevNotifications.map((notification) =>
        notification.id === id ? { ...notification, status: "read" } : notification
      )
    );
  };

  const handleDelete = (id) => {
    setNotifications((prevNotifications) =>
      prevNotifications.filter((notification) => notification.id !== id)
    );
  };

  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Type</th>
                    <th scope="col">Content</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {currentNotifications.map((notification, i) => (
                      <tr key={i}>
                        <td>{notification.id}</td>

                        <td>{notification.timestamp}</td>

                        <td>{notification.type}</td>

                        <td>{notification.content}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${notification.status}`}
                          >
                            {notification.status}
                          </span>
                        </td>

                        <td>
                          <div className="d-flex align-items-center gap-2">
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-primary">
                                visibility
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
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

            {/* Pagination */}
             {/* Pagination */}
             <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
              <span className="fs-12 fw-medium">
                Showing {indexOfFirstItem + 1} to {Math.min(indexOfLastItem, notifications.length)} of {notifications.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <button
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage - 1)}
                      disabled={currentPage === 1}
                    >
                      <span className="material-symbols-outlined">
                        keyboard_arrow_left
                      </span>
                    </button>
                  </li>

                  {Array.from({ length: Math.ceil(notifications.length / itemsPerPage) }, (_, i) => (
                    <li className="page-item" key={i + 1}>
                      <button
                        className={`page-link ${currentPage === i + 1 ? "active" : ""}`}
                        onClick={() => handlePageChange(i + 1)}
                      >
                        {i + 1}
                      </button>
                    </li>
                  ))}

                  <li className="page-item">
                    <button
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage + 1)}
                      disabled={currentPage === Math.ceil(notifications.length / itemsPerPage)}
                    >
                      <span className="material-symbols-outlined">
                        keyboard_arrow_right
                      </span>
                    </button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Notifications;
