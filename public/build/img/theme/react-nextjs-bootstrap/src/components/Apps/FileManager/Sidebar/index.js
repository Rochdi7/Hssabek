"use client";

import { Card, Form, ProgressBar } from "react-bootstrap";
import Link from "next/link";
import { usePathname } from "next/navigation";

const Sidebar = () => {
  const pathname = usePathname();

  return (
    <>
      <Card className="bg-white border-0 rounded-3 rounded-bottom-0">
        <Card.Body className="p-4">
          <Form className="position-relative default-src-form mb-4 pb-1">
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

          <ul className="fm-sidebar-nav ps-0 mb-0 list-unstyled">
            <li className="mb-4">
              <Link
                href="/apps/file-manager/"
                className={`d-flex align-items-center text-decoration-none justify-content-between ${
                  pathname === "/apps/file-manager/" ? "active" : ""
                }`}
              >
                <div className="d-flex align-items-center">
                  <span className="material-symbols-outlined fs-18 position-relative top-1 me-2">
                    inbox
                  </span>
                  <span className="fw-semibold">My Drive</span>
                </div>
                <span>6</span>
              </Link>

              <ul className="mb-0 list-unstyled file-subdown">
                <li>
                  <Link
                    href="/apps/file-manager/assets/"
                    className={`text-decoration-none ${
                      pathname === "/apps/file-manager/assets/" ? "active" : ""
                    }`}
                  >
                    Assets
                  </Link>
                </li>
                <li>
                  <Link
                    href="/apps/file-manager/projects/"
                    className={`text-decoration-none ${
                      pathname === "/apps/file-manager/projects/"
                        ? "active"
                        : ""
                    }`}
                  >
                    Projects
                  </Link>
                </li>
                <li>
                  <Link
                    href="/apps/file-manager/personal/"
                    className={`text-decoration-none ${
                      pathname === "/apps/file-manager/personal/"
                        ? "active"
                        : ""
                    }`}
                  >
                    Personal
                  </Link>
                </li>
                <li>
                  <Link
                    href="/apps/file-manager/applications/"
                    className={`text-decoration-none ${
                      pathname === "/apps/file-manager/applications/"
                        ? "active"
                        : ""
                    }`}
                  >
                    Applications
                  </Link>
                </li>
              </ul>
            </li>

            <li className="mb-4">
              <Link
                href="/apps/file-manager/documents/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/file-manager/documents/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2 text-success">
                  description
                </span>
                <span className="fw-medium">Documents</span>
              </Link>
            </li>

            <li className="mb-4">
              <Link
                href="/apps/file-manager/media/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/file-manager/media/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2 text-info">
                  perm_media
                </span>
                <span className="fw-medium">Media</span>
              </Link>
            </li>

            <li className="mb-4">
              <Link
                href="/apps/file-manager/recents/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/file-manager/recents/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2 text-primary-div">
                  schedule
                </span>
                <span className="fw-medium">Recents</span>
              </Link>
            </li>

            <li className="mb-4">
              <Link
                href="/apps/file-manager/important/"
                className={`d-flex align-items-center text-decoration-none ${
                  pathname === "/apps/file-manager/important/" ? "active" : ""
                }`}
              >
                <span className="material-symbols-outlined fs-18 position-relative top-1 me-2 text-warning">
                  grade
                </span>
                <span className="fw-medium">Important</span>
              </Link>
            </li>

            <li className="mb-4">
              <Link
                href="/apps/file-manager/spam/"
                className={`d-flex align-items-center text-decoration-none justify-content-between ${
                  pathname === "/apps/file-manager/spam/" ? "active" : ""
                }`}
              >
                <div className="d-flex align-items-center">
                  <span className="material-symbols-outlined fs-18 position-relative top-1 me-2 text-primary">
                    report_gmailerrorred
                  </span>
                  <span className="fw-medium">Spam</span>
                </div>
                <span>10</span>
              </Link>
            </li>

            <li>
              <Link
                href="/apps/file-manager/trash/"
                className={`d-flex align-items-center text-decoration-none justify-content-between ${
                  pathname === "/apps/file-manager/trash/" ? "active" : ""
                }`}
              >
                <div className="d-flex align-items-center">
                  <span className="material-symbols-outlined fs-18 position-relative top-1 me-2 text-danger">
                    delete
                  </span>
                  <span className="fw-medium">Trash</span>
                </div>
                <span>15</span>
              </Link>
            </li>
          </ul>
        </Card.Body>
      </Card>

      <Card className="bg-white border-0 rounded-3 rounded-top-0 border-top mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-15">Storage Status</h4>
          <span className="fs-13 d-block mb-2">% 50 GB used of 100 GB</span>

          <ProgressBar
            variant="primary"
            now={50}
            style={{
              height: "4px",
            }}
          />
        </Card.Body>
      </Card>
    </>
  );
};

export default Sidebar;
