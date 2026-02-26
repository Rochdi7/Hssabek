"use client";

import { Card, Form } from "react-bootstrap";
import Link from "next/link";
import { usePathname } from "next/navigation";

const Sidebar = () => {
  const pathname = usePathname();
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Form className="position-relative default-src-form mb-3 pb-1">
            <Form.Control
              type="text"
              className="rounded-1"
              placeholder="Search"
            />
            <span
              className="material-symbols-outlined fs-18 position-absolute start-0 translate-middle-y"
              style={{
                top: "20px",
              }}
            >
              search
            </span>
          </Form>

          <Link
            href="/apps/email/compose/"
            className="btn btn-primary fs-16 fw-medium text-center d-block py-2 mb-4"
          >
            <div className="d-flex align-items-center justify-content-center py-lg-1">
              <span className="material-symbols-outlined fs-18 me-2">edit</span>
              <span>Compose</span>
            </div>
          </Link>

          <ul className="email-sidebar-nav ps-0 mb-4 list-unstyled">
            <li className="mb-3 d-flex justify-content-between align-items-center">
              <Link
                href="/apps/email/inbox/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/email/inbox/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  inbox
                </span>
                <span className="fw-medium">Inbox</span>
              </Link>
              <span className="fs-13">10</span>
            </li>

            <li className="mb-3">
              <Link
                href="/apps/email/starred/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/email/starred/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  star_rate
                </span>
                <span className="fw-medium">Started</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="/apps/email/snoozed/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/email/snoozed/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  alarm
                </span>
                <span className="fw-medium">Snoozed</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="/apps/email/sent-mail/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/email/sent-mail/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  send
                </span>
                <span className="fw-medium">Sent</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="/apps/email/draft/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/email/draft/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  draft
                </span>
                <span className="fw-medium">Drafts</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="/apps/email/important/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/email/important/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  bookmark
                </span>
                <span className="fw-medium">Important</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="#"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "#" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  auto_read_pause
                </span>
                <span className="fw-medium">Chats</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="#"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "#" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  schedule_send
                </span>
                <span className="fw-medium">Scheduled</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="#"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "#" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  live_help
                </span>
                <span className="fw-medium">Spam</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="#"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "#" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  delete
                </span>
                <span className="fw-medium">Trash</span>
              </Link>
            </li>

            <li className="mb-3">
              <Link
                href="#"
                className="d-flex align-items-center text-decoration-none"
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  account_circle
                </span>
                <span className="fw-medium">Personal</span>
              </Link>
            </li>

            <li>
              <Link
                href="#"
                className="d-flex align-items-center text-decoration-none"
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                  trip
                </span>
                <span className="fw-medium">Company</span>
              </Link>
            </li>
          </ul>

          <button className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg">
            <span className="py-sm-1 d-block">
              <i className="ri-add-line d-none d-sm-inline-block"></i>
              <span>Add New Label</span>
            </span>
          </button>
        </Card.Body>
      </Card>
    </>
  );
};

export default Sidebar;
