import { Row, Col, Card } from "react-bootstrap";
import Stats from "@/components/Dashboard/Sales/Stats";
import RecentEarnings from "@/components/Dashboard/Sales/RecentEarnings";
import SalesByLocations from "@/components/Dashboard/Sales/SalesByLocations";
import TransactionHistory from "@/components/Dashboard/Sales/TransactionHistory";
import RecentOrders from "@/components/Dashboard/Sales/RecentOrders";
import RealTimeSales from "@/components/Dashboard/Sales/RealTimeSales";
import SalesOverview from "@/components/Dashboard/Sales/SalesOverview";
import GrossEarnings from "@/components/Dashboard/Sales/GrossEarnings";

export default function Page() {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 p-4 pb-0 mb-4">
        <Stats />

        <Row>
          <Col xs={12} sm={12} lg={7} xl={8}>
            <RecentEarnings />
          </Col>

          <Col xs={12} sm={12} lg={5} xl={4}>
            <SalesByLocations />
          </Col>
        </Row>
      </Card>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={4}>
          <TransactionHistory />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={8}>
          <RecentOrders />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={4} xl={4}>
          <RealTimeSales />
        </Col>

        <Col xs={12} sm={12} md={12} lg={4} xl={4}>
          <SalesOverview />
        </Col>

        <Col xs={12} sm={12} md={12} lg={4} xl={4}>
          <GrossEarnings />
        </Col>
      </Row>
    </>
  );
}
