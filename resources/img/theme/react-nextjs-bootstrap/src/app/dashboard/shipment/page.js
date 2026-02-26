import AverageDeliveryTime from "@/components/Dashboard/Shipment/AverageDeliveryTime";
import LiveShipmentStatus from "@/components/Dashboard/Shipment/LiveShipmentStatus";
import TodaysShipments from "@/components/Dashboard/Shipment/TodaysShipments";
import OnTimeDelivery from "@/components/Dashboard/Shipment/OnTimeDelivery";
import ShipmentDelivered from "@/components/Dashboard/Shipment/ShipmentDelivered";
import TopShippingMethods from "@/components/Dashboard/Shipment/TopShippingMethods";
import TotalCustomer from "@/components/Dashboard/Shipment/TotalCustomer";
import TotalIncome from "@/components/Dashboard/Shipment/TotalIncome";
import TotalOrder from "@/components/Dashboard/Shipment/TotalOrder";
import TotalShipment from "@/components/Dashboard/Shipment/TotalShipment";
import TrackingOrder from "@/components/Dashboard/Shipment/TrackingOrder";
import { Row, Col } from "react-bootstrap";
import ShippingToLeadingCountriesWorldwide from "@/components/Dashboard/Shipment/ShippingToLeadingCountriesWorldwide";
import Chat from "@/components/Dashboard/Shipment/Chat";
import ShipmentList from "@/components/Dashboard/Shipment/ShipmentList";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} md={12} lg={6} xxl={6}>
          <Row>
            <Col sm={6}>
              <TotalIncome />
            </Col>

            <Col sm={6}>
              <TotalShipment />
            </Col>

            <Col sm={6}>
              <TotalCustomer />
            </Col>

            <Col sm={6}>
              <TotalOrder />
            </Col>
          </Row>
        </Col>

        <Col xs={12} md={12} lg={6} xxl={6}>
          <ShipmentDelivered />
        </Col>
      </Row>

      <Row>
        <Col xl={12} xxl={8}>
          <Row>
            <Col md={6} lg={6}>
              <AverageDeliveryTime />
            </Col>

            <Col md={6} lg={6}>
              <LiveShipmentStatus />
            </Col>
          </Row>

          <TrackingOrder />
        </Col>

        <Col xl={12} xxl={4}>
          <ShippingToLeadingCountriesWorldwide />

          <Chat />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col md={12} lg={6} xl={6} xxl={4}>
          <TopShippingMethods />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={4}>
          <TodaysShipments />
        </Col>

        <Col md={6} lg={6} xl={6} xxl={4}>
          <OnTimeDelivery />
        </Col>
      </Row>


      <ShipmentList />
    </>
  );
}
